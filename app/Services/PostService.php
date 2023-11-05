<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostService
{
    private $postModel;

    public function __construct(Post $post)
    {
        $this->postModel = $post;
    }   
    
    public function countPosts()
    {
        return Cache::remember('count.posts', now()->addSecond(60), function () {
            return $this->postModel->count();
        });
    }

    public function getLatestPosts($limit = 2)
    {
        $cacheKey = "latest_posts_{$limit}";
    
        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return $this->postModel::orderBy('id', 'DESC')
                ->with(['user', 'comments', 'likes'])
                ->limit($limit)
                ->get();
        });
    }

    public function getPaginate()
    {
        return $this->postModel
        ->orderBy('id', 'DESC')->paginate(8);
    }

    // Post like method

    
}