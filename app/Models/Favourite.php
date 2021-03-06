<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    public function getShop(){
        return $this->belongsTo(\App\Models\User::class,'favourite_shop_id','id');
    }
}
