<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\Request;



class MyProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->middleware('auth');
        $this->profileService = $profileService;
    }
    

    public function index(Request $request )
    {
        $userId = $request->user()->id;
        $user = $this->profileService->getUserProfile($userId);

        return view('myprofile.index',compact('user'));
    }


    public function show(Request $request,User $id)
    {
        $id = $request->user()->id;
        $user = User::findOrFail($id);

        return view('myprofile.show',[
            'user'=> $user
        ]);
    }

   
    public function edit(Request $request , User $id)
    {
        $id = $request->user()->id;
        $user = User::findOrFail($id);
        return view('myprofile.edit',[
            'user'=> $user
        ]);
    }



    public function update(ProfileRequest $request, User $user)
    {
        $this->profileService->updateProfile($user, $request);
    
        return redirect()->route('profile.index');
    }
    


}
