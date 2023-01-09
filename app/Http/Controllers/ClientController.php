<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Federal;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        // $data = [];
       

        $federals = Federal::all();
        // return $arr;
       
        $clients = Client::latest()->paginate(5);
        
        return view('clients.index',compact('clients','federals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [];
        $federal = Federal::all();
        // dd($federal);
        return view('clients.create',compact('federal'));
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
            'name' => 'required',
            'code' => 'required',
            'federal_id' => 'required',  
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'fillup_date'=>'required',
            
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalName(); 
            //dd($image);
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Client::create($input);
     
        return redirect()->route('clients.index')
                        ->with('success','clients added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        $data = [];
        $federal = Federal::all();
        return view('clients.edit',compact('client','federal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'federal_id' => 'required',
            'code' => 'required',
            
        ]);
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $client->update($input);
        // dd($client);
    
      
    
        // $client->update($request->all());
    
        return redirect()->route('clients.index')
                        ->with('success','Client edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
    
        return redirect()->route('clients.index')
                        ->with('success','deleted successfully');
    }
}
