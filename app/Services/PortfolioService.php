<?php
namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Cache;

class PortfolioService
{
    public function countPortfolios()
    {
        return Cache::remember('count.Portfolio', now()->addSecond(120), function () {
            return Portfolio::count();
        });
    }

    public function getLatestPortfolios($limit = 6)
    {
        // Define a cache key for this specific query
        $cacheKey = "latest_portfolios_{$limit}";

        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return Portfolio::orderBy('id', 'DESC')
                ->limit($limit)
                ->get();
        });
    }
}