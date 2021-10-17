<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function category(){
        return $this->belongsTo(\App\Models\Category::class,'shop_category','id');
    }
}
