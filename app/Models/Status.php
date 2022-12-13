<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $table = 'status';
    protected $fillable = [
        'client_id','product_id','status','remarks','appurl'

    ];
    public function client(){
        return $this->belongsTo(Client::class,'client_id','id');
    }
    public function product(){
    return $this->belongsTo(Product::class,'product_id','id');
    }
}
