<?php
namespace App\Services;

use App\Models\Technology;
use Illuminate\Support\Facades\Cache;

class TechnologyService
{
    private $technology;

    public function __construct(Technology $technology)
    {
        $this->technology = $technology;
    }

    // Other methods...

    public function getAll()
    {
        $cacheKey = "allTechnologies";

        return Cache::remember($cacheKey, now()->addMinutes(15), function () {
            return $this->technology->all();
        });
    }
}
