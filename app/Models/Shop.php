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

    public function user(){
        return $this->belongsTo(\App\Models\User::class,'user_id','id');
    }

    public function shopMenu(){
        return $this->hasOne(\App\Models\ShopItem::class,'id','shop_id');
    }
}
