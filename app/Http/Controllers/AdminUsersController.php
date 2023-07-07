<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class AdminUsersController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->where('is_admin','0')->paginate(30);
        return view('admin.users.index',[
            'users'=>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id)
    {
        $oneUser = User::findOrFail($id);
        return view('admin.users.show',[
            'user'=>$oneUser
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',[
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
   
        public function update(User $id , Request $request)
        {
    
            $request->validate([
                'name'=>['required','max:20'],
                'image'=>['max:10240','mimes:jpg,bmp,png'],
                'phone'=>['min:7','max:12','regex:/^(\+99)[0-9]{9}$/']
            ]);
          
           
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
                $filename = null;
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
            $user->is_admin = $request->input('is_admin');
            $user->update();
    
             return redirect()->route('admin.user.index');
    
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if($id == Auth()->user()->id){
        return back()->with('success','You cannot delete yourself!');
        }
        $users = User::findOrFail($id);
        $users->delete();

        return back()->with('success','User was deleted !');
    }
}
