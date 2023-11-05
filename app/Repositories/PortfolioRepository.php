<?php

namespace App\Repositories;

use App\Models\Portfolio;

class PortfolioRepository
{
    public function create($data)
    {
        return Portfolio::create($data);
    }

    public function update(Portfolio $portfolio, $data)
    {
        $portfolio->update($data);
        return $portfolio;
    }

    public function delete(Portfolio $portfolio)
    {
        $portfolio->delete();
    }
}
