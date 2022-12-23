<?php

namespace App\Http\Controllers\API;
use App\Models\Status;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiStatusController extends Controller
{
    public function status(){

        $status = DB::table('status')
        ->join('clients', 'status.id', '=', 'status.client_id')
            ->join('products', 'status.id', '=', 'status.product_id')
            ->select('status.*', 'clients.name as client'  , 'products.name as product')
            ->get();
        return response()->json([
            'status'=> true,
            'message'=>'status listed',
            'data'=>$status
        ]);
 
        
   
    
    }
    public function statusbyid($id){
        $status = Status::find($id)
        ->join('clients', 'status.id', '=', 'status.client_id')
        ->join('products', 'status.id', '=', 'status.product_id')
        ->select('status.*', 'clients.name as client'  , 'products.name as product')
        ->get();
    return response()->json([
        'status'=> true,
        'message'=>'status listed',
        'data'=>$status
    ]);

    }

    public function products(){
            // dd('hello');
        $products = Product::all();
            // dd($products);
        return response()->json([
            'products'=> true,
            'message'=>'products listed',
            'data'=>$products
        ]);
}


}
