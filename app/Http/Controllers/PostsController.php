<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){
       $allpost = Post::orderBy('id','DESC')->paginate(8);
       return view('allpost.index',[
           'allposts'=>$allpost
       ]);
    }

    public function findOne($id){
        $post = Post::findOrFail($id);
        return view('read.index',[
            'post'=>$post
        ]);
    }
}
