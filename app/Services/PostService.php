<?php

namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostService
{
    public function countPosts()
    {
        return Cache::remember('count.posts', now()->addSecond(60), function () {
            return Post::count();
        });
    }

    public function getLatestPosts($limit = 2)
    {
        $cacheKey = "latest_posts_{$limit}";
    
        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return Post::orderBy('id', 'DESC')
                ->with(['user', 'comments', 'likes'])
                ->limit($limit)
                ->get();
        });
    }
}