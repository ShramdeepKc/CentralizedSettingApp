<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $clients = Client::all();
        // $products = Product::all();
        // $status = Status::latest()->paginate(5);
        $search = $request['search'] ?? "";
        if($search != ""){
                // $clients = Client::where('name','=',"$search")->get(); 
                // $products = Product::where('name','=',"$search")->get(); 
                $status = Status::leftjoin('clients', 'status.client_id', '=' ,'clients.id')
                            ->where('clients.name', 'LIKE', "$search%")
                           
                             ->get(); 
                // $status = Status::where('client_id','=',$search)->get(); 
        }
        else{
            $clients = Client::all();
        $products = Product::all();
        $status = Status::latest()->paginate(5);

        }
        $clients = Client::all();
        $products = Product::all();
        


        return view('status.index',compact('clients','products','status','search'))
            ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();
        return view('status.create',compact('clients','products'));    

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
           'client_id' => 'required',
           'product_id' => 'required',
           'status'=>'required',
           'remarks'=>'required',
           'appurl'=>'required' 
        ]);
    
        Status::create($request->all());
     
        return redirect()->route('status.index')
                        ->with('success','clients added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function edit(Status $status)
    {
        $data = [];
        $clients = Client::all();
        $products = Product::all();
        return view('status.edit',compact('clients','products','status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Status $status)
    {
        $request->validate([
            'client_id'=>'required',
            'product_id'=>'required',
            'status'=>'required',
            'remarks'=>'required',
            'appurl'=>'required'
        ]);
    
        $status->update($request->all());
    
        return redirect()->route('status.index')
                        ->with('success','Status edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        $status->delete();
    
        return redirect()->route('status.index')
                        ->with('success','deleted successfully');
    }
}
