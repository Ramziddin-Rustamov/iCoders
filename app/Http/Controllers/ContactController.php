<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Services\ContactService;
use App\Services\TechnologyService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $technologyService;
    private $contactService;

    public function __construct(ContactService $contactService ,  TechnologyService $service)
    {
        $this->technologyService = $service;
        $this->contactService = $contactService;
    }
    
    public function index()
    {
        $technologies =  $this->technologyService->getAll();
        return view('contact.index',compact('technologies'));
    }

    public function store(Request $request ,ContactRequest $contactRequest )
    {
        $data = $contactRequest->validated();
        $user = $request->user();
        
        $data['user_id'] = $user->id;
        $this->contactService->createContactMessage($data);
        return back()->with('success','Cool ...');

    }
}
