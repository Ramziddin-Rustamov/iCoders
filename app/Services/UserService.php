<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UserService
{
    public  function countUsers()
    {
        return Cache::remember('count.User', now()->addSecond(60), function () {
            return User::count();
        });
    }

    public function getAdminUsers($limit = 4)
    {
        $cacheKey = "get_admin_user{$limit}";
       return Cache::remember($cacheKey,now()->addMinutes(60),function() use($limit){
        return User::orderBy('id', 'DESC')
        ->where('is_admin', 1)
        ->limit($limit)
        ->get();
       });
    }
}