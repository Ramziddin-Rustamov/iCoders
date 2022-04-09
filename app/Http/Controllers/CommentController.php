<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post ,Request $request)
    {
        // validation

        $request->validate(([
            'body'=>['required']
        ]));
        


        // create a new comment
        $post->comments()->create([
            'user_id'=> $request->user()->id,
            'body'=> $request->input('body')
        ]);

        return back();
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id);
        return view('read.user',[
            'user' => $user
        ]);
    }
}
