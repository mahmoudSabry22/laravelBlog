<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Category;
use App\Tag;
use App\Post;

class PostsController extends Controller
{

    private $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required|exists:categories,id',
        'content' => 'required',
        'keywords' => 'required|max:255',
        'description' => 'required|max:255',
        'image' => 'required|image',

    ];

    public function __construct()
    {
        $this->rules['tag_id'] = 'required|array|in:'.implode(',', Tag::all()->pluck('id')->toArray());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('category', 'tags', 'user');

        if (request()->has('search') && checkValue(request()->search)) 
        {
            $posts->where('title', 'LIKE', '%'.request()->search.'%')->orWhere('keywords', 'LIKE', '%'.request()->search.'%');
        }

        if (request()->has('cat') && checkValue(request()->cat))
        {
            $posts->orWhere('category_id', request()->cat);
        }

        if (request()->has('tag') && checkValue(request()->tag)) 
        {
            $posts->orWhereHas('tags', function ($query) {
                return $query->where('tags.id', request()->tag);
            });
        }
        
        $postsCount = $posts->count();
        $allPosts = $posts->paginate(3);
        

        return view('backend.posts.index', [
            'title' => "Show All Posts",
            'index' => $allPosts,
            'cats' => Category::all(),
            'tags' => Tag::all(),
            'posts_count' => $postsCount,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();
        $tags = Tag::all();
        return view('backend.posts.create', [
            'title' => "Create Posts",
            'cats' => $cats,
            'tags' => $tags,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, $this->rules);

        $data['image'] = UploadImages('posts', $request->file('image'));

        $data['user_id'] = auth()->user()->id;

        $post =  Post::create($data);

        $post->tags()->attach($data['tag_id']);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::where('id', $id)->with('category', 'tags', 'user')->first();
        if ($post) {
            return view('backend.posts.show', [
                'title' => "Show Post " . ' : ' . $post->title,
                'show'  => $post,
            ]);
        }
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->with('category', 'tags', 'user')->first();
        $cats = Category::all();
        $tags = Tag::all();
        if ($post) {
            return view('backend.posts.edit', [
                'title' => "Show Post " . ' : ' . $post->title,
                'edit'  => $post,
                'cats' => $cats,
                'tags' => $tags,
            ]);
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return back();
        }

        $this->rules['image'] = 'sometimes|nullable|image';

        $data = $this->validate($request, $this->rules);

        if ($request->hasFile('image')) {
            $data['image'] = UpdateImages($post->image, 'posts', $request->file('image'));
        }

        $post->update($data);

        $post->tags()->sync($data['tag_id']);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post) {
            if (file_exists(public_path('uploads/' . $post->image))) {
                @unlink(public_path('uploads/' . $post->image));
            }
            $post->delete();
            return redirect()->route('posts.index');
        }
        return back();
    }
}
