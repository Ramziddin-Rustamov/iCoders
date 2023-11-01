<?php
namespace App\Services;


use App\Models\Technology;
use Illuminate\Support\Facades\Cache;


class TechnologyService
{
    public function countTechnologies()
    {
        return Cache::remember('count.Technology', now()->addSecond(240), function () {
            return Technology::count();
        });
    }

    public function getTechnologies($limit = 3)
    {
        $cacheKey = "technologies_{$limit}";
    
        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return Technology::orderBy('id', 'asc')->limit($limit)->get();
        });
    }
}