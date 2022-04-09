<?php

namespace App\Http\Controllers;

use App\Models\SlideImage;
use Illuminate\Http\Request;

class AdminSlideImageController extends Controller
{
    public function index()
    {
        $slide = SlideImage::paginate(10); 
        return view('admin.slide.index',[
            'slides'=>$slide
        ]);
    }
    
    public function create(){
        return view('admin.slide.create');
    }

    public function store(Request $req){
        
        $req->validate([
           'title_uz'=>['max:100','required'],
           'title_en'=>['max:100','required'],
           'body_uz'=>['max:250','required'],
           'body_en'=>['max:250','required'],
           'image'=>['image','required','mimes:jpg,png,jpeg,gif,svg']
        ]);

        $file = $req->file('image');
        $extention =  $file->getClientOriginalExtension();
        $filename = 'image/'.time().'.'.$extention;
        $file->move('image/',$filename);

        $slide = new SlideImage();
        $slide->title_uz = $req->title_uz;
        $slide->title_en = $req->title_en;
        $slide->body_en = $req->body_en;
        $slide->body_uz = $req->body_uz; 
        $slide->image = $filename;
        $slide->save();
        
        return redirect()->route('slide.index')->with('success','New data stored');
    }

    public function delete( $id){
        $slide = SlideImage::findOrFail($id);
        $slide->delete();
        return back()->with('success','Post Deleted');
    }
}