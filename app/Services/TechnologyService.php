<?php
namespace App\Services;

use App\Models\Technology;
use Illuminate\Support\Facades\Cache;


class TechnologyService
{
    protected $technology;


    public function __construct(Technology $technology)
    {
        $this->technology = $technology;
    }


    public function countTechnologies()
    {
        return Cache::remember('count.Technology', now()->addMinute(30), function () {
            return $this->technology->count();
        });
    }

    public function getTechnologies($limit = 3)
    {
        $cacheKey = "technologies_{$limit}";
    
        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return  $this->technology->orderBy('id', 'asc')->limit($limit)->get();
        });
    }


    public function getAll()
    {
        $cacheKey = "allTechnologies";
    
        return Cache::remember($cacheKey, now()->addMinute(15), function (){
            return  $this->technology->all();
        });
    }

    
}