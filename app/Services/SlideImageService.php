<?php
namespace App\Services;

use App\Models\SlideImage;
use Illuminate\Support\Facades\Cache ;

class SlideImageService
{
    public function getSlideImages($limit = 3)
    {
        $cacheKey = "slide_images_{$limit}";
    
        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return SlideImage::orderBy('created_at', 'DESC')
                ->limit($limit)
                ->get();
        });
    }
}