<?php

namespace App\Repositories;

use App\Models\Post;
use App\Models\Comment;

class CommentRepository
{
    public function create($data)
    {
        if(is_array($data)){
            Comment::create($data);
        }
        abort(500,"Provided {$data} is not array!");
    }

    public function delete($id)
    {
        Comment::findOrFail($id)->delete();
    }
}
