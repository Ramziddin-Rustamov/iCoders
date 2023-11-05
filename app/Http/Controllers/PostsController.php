<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;

class PostsController extends Controller
{
    private $PostService;

    public function __construct(PostService $PostService)
    {
        $this->PostService = $PostService;
    }

    public function index()
    {
        $allposts = $this->PostService->getPaginate();
        return view('allpost.index', compact('allposts'));
    }
    

    public function findOne(Post $post)
    {
        if($this->PostService->countPosts()){
            return view('read.index', compact('post'));
        }
        abort(404); 
    }
}

