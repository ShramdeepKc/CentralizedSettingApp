<?php

namespace App\Http\Controllers;

use App\Models\Federal;
use Illuminate\Http\Request;

class FederalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $federals = Federal::latest()->paginate(5);
    
        return view('federals.index',compact('federals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('federals.create');
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
        ]);
    
        Federal::create($request->all());
     
        return redirect()->route('federals.index')
                        ->with('success','Federal added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Federal  $federal
     * @return \Illuminate\Http\Response
     */
    public function show(Federal $federal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Federal  $federal
     * @return \Illuminate\Http\Response
     */
    public function edit(Federal $federal)
    {
        return view('federals.edit',compact('federal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Federal  $federal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Federal $federal)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
        ]);
    
        $federal->update($request->all());
    
        return redirect()->route('federals.index')
                        ->with('success','Federal updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Federal  $federal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Federal $federal)
    {
        
        $federal->delete();
    
        return redirect()->route('federals.index')
                        ->with('success','Product federal successfully');
    }
}
