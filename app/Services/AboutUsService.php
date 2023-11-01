<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Cache;

class AboutUsService
{
 public function getAdminUsers()
    {
        $cacheKey = 'admin_users';

        return Cache::remember($cacheKey, now()->addDays(1), function () {
            return User::where('is_admin', 1)->get();
        });
    }
}