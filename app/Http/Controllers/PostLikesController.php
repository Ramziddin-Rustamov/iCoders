<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostLikesController extends Controller
{
    private $postService;

    public function __construct(PostService $postS)
    {
        $this->postService = $postS;
    }
    public function store(Post $post,Request $request)
    {

        if($post->likedBy($request->user()))
        {
            return response(null,409);
        }
        $post->likes()->create([
            'user_id' =>$request->user()->id,
        ]);
        return back();
    }

    public function destroy(Post $post , Request $request)
    {
        $request->user()->likes()->where('post_id',$post->id)->delete();

        return back();
    }
}
