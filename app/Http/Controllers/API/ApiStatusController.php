<?php

namespace App\Http\Controllers\API;
use App\Models\Status;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiStatusController extends Controller
{
    public function status(){

        $status = DB::table('status')->get();
        return response()->json([
            'status'=>true,
            'message'=>'status retrived',
            'data'=>$status,
        ]);
 
        
   
    
    }
}
