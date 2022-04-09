<?php

namespace App\Http\Controllers;

use App\Models\ClientView;
use App\Models\User;
use Illuminate\Http\Request;

class ClientViewController extends Controller
{
    public function index(){
        $clientview = ClientView::orderBy('id','DESC')->simplePaginate(6);
        return view('clients.index',[
            'clientviews' => $clientview
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
        $request->validate([
            'clientView'=>['required','max:300']
        ]);
        
        $client = new ClientView();
        $client->clientView = $request->clientView;
        $client->user_id = $request->user()->id;
        $client->save();
        
        return back()->with('success','You added ! , Thanks our feedback .');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = User::findOrFail($id);
        return view('clients.show',[
            'user'=>$client
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
        //
    }

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
    public function destroy($id)
    {
        //
    }
}
