<?php
namespace App\Services;

use App\Models\Technology;

class ServicesService {

    private $technology;


    public function __construct(Technology $tech)
    {
        $this->technology = $tech;
    }

    public function getAllSerives(){
        return $this->technology->all();
    }
}