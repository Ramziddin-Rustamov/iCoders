<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Http\Request;

class AdminTechnoligyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tech = Technology::orderBy('id','DESC')->paginate(15);
       return view('admin.technology.index',[
           'technology'=>$tech
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){

        return view('admin.technology.create');
    }

    public function store(Request $req){
        $req->validate([
            'name'=> ['required'],
            'body_uz'=> ['required'],
            'body_en'=> ['required'],
            'image'=> ['image','mimes:jpg,jpeg,png,gif','required']
        ]);
        
        $file = $req->file('image');
        $extension =  $file->getClientOriginalExtension();
        $filename = 'image/'.time().'.'.$extension;
        $file->move('image/',$filename);

        $technology = new Technology();
        $technology->name = $req->name;
        $technology->body_uz = $req->body_uz;
        $technology->body_en = $req->body_en;
        $technology->image = $filename;
        $technology->save();

        return redirect()->route('admin.technology.index')->with('success', 'Data uploaded!');
    }

    public function edit(Technology $id){
        return view('admin.technology.edit',[
            'post'=>$id
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tech = Technology::findOrFail($id);
        return view('admin.technology.edit',[
            'technology' =>$tech
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $post = Technology::findOrFail($id);
        $post->delete();
        return back()->with('success','Post Deleted');
    }
}
