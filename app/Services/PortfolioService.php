<?php
namespace App\Services;

use App\Models\Portfolio;
use Illuminate\Support\Facades\Cache;

class PortfolioService
{
    protected $portfolio;

    public function __construct(Portfolio $portfolio)
    {
        $this->portfolio = $portfolio;
    }


    public function countPortfolioes()
    {
        return Cache::remember('count.Portfolio', now()->addSecond(120), function () {
            return $this->portfolio->count();
        });
    }

    public function getLatestPortfolioes($limit = 6)
    {
        // Define a cache key for this specific query
        $cacheKey = "latest_portfolios_{$limit}";

        return Cache::remember($cacheKey, now()->addMinutes(15), function () use ($limit) {
            return $this->portfolio->orderBy('id', 'DESC')
                ->limit($limit)
                ->get();
        });
    }

    public function indexPaginate($paginate = 6)
    {
        $cacheKeyIndex = "index_portfolio";
        return Cache::remember($cacheKeyIndex , now()->addMinutes(60), function () use ($paginate) {
            return $this->portfolio->orderBy('id','DESC')->paginate($paginate);
        });
    }

    public function findOne($id){
         return $this->portfolio->find($id);
    }
}
