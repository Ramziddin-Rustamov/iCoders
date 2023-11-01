<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\AboutUsService;

class AboutUsController extends Controller
{


    protected $AboutUsService;

    public function __construct(AboutUsService $AboutUsService)
    {
        $this->AboutUsService = $AboutUsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUsers = $this->AboutUsService->getAdminUsers();
        return view('about.index', ['team' => $adminUsers]);
    }
}