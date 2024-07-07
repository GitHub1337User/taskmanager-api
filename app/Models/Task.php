<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // public $timestamps = false;
    protected $fillable = ['title','describe','status_id','expire_date','created_at','updated_at'];

    public function status(){
        return $this->belongsTo(Status::class,'status_id','id');
    }
}
