<?php

namespace App\Services;

use App\Models\User;

class AboutUsService
{
    public function getAdminUsers()
    {
        return User::where('is_admin', 1)->get();
    }
}