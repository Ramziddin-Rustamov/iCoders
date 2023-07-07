<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class MyProfileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
            $auth = $request->user()->id;   
            $user = User::findOrFail($auth);
            return view('myprofile.index',[
                'user'=> $user
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('myprofile.cre')
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,User $id)
    {
        $id = $request->user()->id;
        $user = User::findOrFail($id);

        return view('myprofile.show',[
            'user'=> $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request , User $id)
    {
        $id = $request->user()->id;
        $user = User::findOrFail($id);
        return view('myprofile.edit',[
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user , Request $request)
    {
        $request->validate([
            'name'=>['required','max:20'],
            'image'=>['max:10240','mimes:jpg,bmp,png'],
            'phone'=>['min:9','max:12']
        ]);
      
        $oneUser = $user;
        $id = $request->user()->id;
        $user = User::findOrFail($id);
        if ($request->hasfile('image')) {
            $destinationPath = 'public/image/'.$user->image;
            if(File::exists($destinationPath)){
                File::delete($destinationPath);
            }
            $file = $request->file('image');

            $extention =  $file->getClientOriginalExtension();
            $filename = 'image/'.time().'.'.$extention;
            $file->move('image/',$filename);
            $user->image = $filename;
        }else{
            $user->image = $oneUser->image;
        }
        $user->name = $request->input('name');
        $user->linkedin = $request->input('linkedin');
        $user->github = $request->input('github');
        $user->instagram = $request->input('instagram');
        $user->telegram = $request->input('telegram');
        $user->job = $request->input('job');
        $user->location = $request->input('location');
        $user->phone = $request->input('phone');
        $user->about_uz = $request->input('about_uz');
        $user->update();

         return redirect()->route('profile.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
