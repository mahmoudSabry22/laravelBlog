<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request,$id)
    {
        $post = Post::find($id);

        if(!$post)
        {
        	return redirect('/');
        }

        //First Way
       // $c = new Comment;

        //$c->Post_id = $post->id;
        //$c->user_id = auth()->user()->id;
        //$c->comment = $request->comment;
        //$c->save();
        
        // Second Way
        // $c = Comment::create([
        //     'post_id' => $post->id,
        //     'user_id' => auth()->user()->id,
        //     'comment' => request()->comment,
        // ]);

        // Thired Way **Best Practice

        //Mcomments relation get post_id = id of post automatic

        $post->Mcomments()->create([
            'user_id' => auth()->user()->id,
            'comment' => request()->comment,
        ]);
         return redirect()->back()->with([
            'message' => 'Comment Create Successfully'
        ]);
    }

}
