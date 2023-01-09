<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'code','federal_id','image','fillup_date'
    ];
    public function federal(){
        return $this->belongsTo(Federal::class,'federal_id','id');
    }

}
