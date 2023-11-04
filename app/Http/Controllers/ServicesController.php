<?php

namespace App\Http\Controllers;

use App\Services\ServicesService;

class ServicesController extends Controller
{
    private $techServce;

    public function __construct(ServicesService $service)
    {
        $this->techServce = $service;
    }
    public function index()
    {
        $technologies = $this->techServce->getAllSerives();
        return view('services.index',compact('technologies'));
    }

}
