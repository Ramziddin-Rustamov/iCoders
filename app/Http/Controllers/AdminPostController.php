<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Exception;
class AdminPostController extends Controller
{
    public function index(){

        $posts = Post::orderBy('id', 'DESC')->with(['user','comments','likes'])->paginate(20);
        return view('admin.post.index',[
            'posts'=> $posts
        ]);
        
        
    }
    
    public function create(){

        return view('admin.post.create');
    }

    public function store(Request $req){
        $req->validate([
            'title_uz'=> ['required'],
            'title_en'=> ['required'],
            'body_uz'=> ['required'],
            'body_en'=> ['required'],
            'image'=> ['image','mimes:jpg,jpeg,png,gif','required']
        ]);
        
        $file = $req->file('image');
        $extension =  $file->getClientOriginalExtension();
        $filename = 'image/'.time().'.'.$extension;
        $file->move('image/',$filename);

        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->title_uz = $req->title_uz;
        $post->title_en = $req->title_en;
        $post->body_uz = $req->body_uz;
        $post->body_en = $req->body_en;
        $post->image = $filename;
        $post->save();

        return back()->with('success', 'Data uploaded!');
    }

    public function edit(Post $id){
        return view('admin.post.edit',[
            'post'=>$id
        ]);
    }

    public function update(Request $req ,Post $post){
        $req->validate([
            'title_uz'=> ['required'],
            'title_en'=> ['required'],
            'body_uz'=> ['required'],
            'body_en'=> ['required'],
            'image'=> ['required']
        ]);
        $post->user_id = auth()->user()->id;
        $post->title_uz = $req->title_uz;
        $post->title_en = $req->title_en;
        $post->body_uz = $req->body_uz;
        $post->body_en = $req->body_en;
        $post->image = $req->image;
        if($req->hasFile('image')){
            Storage::delete('image/'.$post->image);
            $newName = "image".uniqid()."_".$req->file('image')->extension();
            $req->file('image')->storeAs('image/',$newName);
            $post->image = $newName;
        }
        $post->update();
        return redirect()->route('posts.index')->with('success','Updated Successfully');
    }

    public function destroy($id){
        try{
            // dd($post);
            $post = Post::find($id);
            if($post){
                $file = File::exists(public_path($post->image));
                if($file){
                    File::delete(public_path($post->image));
                    $post->delete();
                    return back()->with('success', 'Deleted with image');
                }
                $post->delete();
                return back()->with('success', ' Deleted without image');
            }
            return back()->with('errors', 'Not found');
        }catch(Exception $e){
        return back()->with('errors', 'Can not be deleted!');
       }
    }

}
