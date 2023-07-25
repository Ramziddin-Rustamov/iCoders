<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::orderBy('id','DESC')->paginate(6);
        return view('portfolio.index',[
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function indexAdmin(){
        $portfolioes = Portfolio::orderBy('id','DESC')->paginate(20);
        return view('admin.portfolio.index',[
            'portfolioes'=>$portfolioes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($request->hasfile('image'))
        {

           foreach($request->file('image') as $image)
           {
               $extension = $image->getClientOriginalExtension();
               $filename = 'image/'.$image->getClientOriginalname().'.'.$extension;
               $image->move('image/', $filename);  
               $data[] = $filename;  
           }
        }

        $port = new Portfolio();
        $port->image =json_encode($data);
        $port->category = $request->category;
        $port->client = $request->client;
        $port->link = $request->link;
        $port->detail_uz = $request->detail_uz;
        $port->detail_en = $request->detail_en;
        $port->save();

        return back()->with('success','Portfolio created successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.show',[
            'portfolio' => $portfolio
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('admin.portfolio.edit',[
            'port' => $portfolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Portfolio $portfolio,Request $request)
    {
        // dd($request->all());
        $request->validate([
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $port = $portfolio;

        if ($request->hasfile('image')) {
            foreach(json_decode($portfolio->image) as $portfolioImage){
                $destinationPath = 'public/image/'.$portfolioImage;
                if(File::exists($destinationPath)){
                    File::delete($destinationPath);
                }
            }
            foreach($request->file('image') as $image)
            {
                $extension = $image->getClientOriginalExtension();
                $filename = 'image/'.$image->getClientOriginalname().'.'.$extension;
                $image->move('image/', $filename);  
                $date[] = $filename;  
                $port->image    = json_encode($date);
            }
        }else{
                $port->image = $portfolio->image;
        }
        $port->category = $request->input('category');
        $port->client   = $request->input('client');
        $port->link     = $request->input('link');
        $port->detail_uz= $request->input('detail_uz');
        $port->detail_en= $request->input('detail_en');
        $port->update();

        return redirect()->route('admin.portfolio.index')->with('success','Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try{
            // dd($post);
            $p = Portfolio::find($id);
            if($p){
                $file = File::exists(public_path($p->image));
                if($file){
                    File::delete(public_path($p->image));
                    $p->delete();
                    return back()->with('success', 'Deleted with image');
                }
                $p->delete();
                return back()->with('success', ' Deleted without image');
            }
            return back()->with('errors', 'Not found');
        }catch(Exception $e){
        return back()->with('errors', 'Can not be deleted!');
       }
    }
}
