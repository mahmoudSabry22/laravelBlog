<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
class FrontendManagerController extends Controller
{
    public function index()
    {
    	$posts = Post::with('category','user')->paginate(9);

        return view('frontend.index',[
        	'posts' => $posts,
        ]);
    }

    public function single($id)
    {
    	
    	$post = Post::with('category','tags','user','Mcomments')->where('id',$id)->first();

        //withCount('MLike')
        
        //$comm = Comment::with('comment_user')->where('post_id',$id)->get();

        //$comm_count = $comm->count();

    	//where('id','!=', $post->id) to dont get in current post in related posts
    	$postsHasSameTags = Post::where('id','!=', $post->id)->whereHas('tags', function ($q) use ($post){
    		return $q->whereIn('tags.id',$post->tags->pluck('id')->toArray());
    	})->orderBy('id','DESC')->limit(3)->get();

    	if(!$post){
    		 return redirect('/');
    	}
    	return view('frontend.single',[
    		'post' => $post,
    		'postsHasSameTags' => $postsHasSameTags,
          //  'comm' =>$comm,
           // 'comm_count' =>$comm_count
    	]);
    }

     public function addLike($post_id)
    {
        // dd($post_id);
        $post = Post::find($post_id);

        if (!$post) {
            return redirect('/');
        }
        // **Best Practice
        $post->MLike()->create([
            'user_id' => auth()->user()->id,
        ]);
        return redirect()->back()->with([
            'message' => 'You Liked The Post'
        ]);
    }

    public function removeLike($post_id)
    {
        $post = Post::find($post_id);
        if (!$post) {
            return redirect('/');
        }
        $post->MLike()->where('user_id', auth()->user()->id)->delete();
        return redirect()->back()->with([
            'message' => 'You UnLiked The Post'
        ]);
    }

    public function removeComment($comment_id)
    {
         $post = Comment::find($comment_id);
        if (!$post) {
            return redirect('/');
        }
        $post->delete();
        return redirect()->back()->with([
            'message' => 'You Delete The Your Comment'
        ]);
    }

    public function showProfile($name_user)
    {
        return view('frontend.profile');
    }

    public function showPosts($id)
    {
        
        if(auth()->user()->id == $id)

        {
            $posts = Post::with('category','user')->where('user_id',$id)->paginate(9);
        
             return view('frontend.index',[
               'posts' => $posts,
            ]);
        }else{
            return redirect('/');
        }
        
    }


     public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
