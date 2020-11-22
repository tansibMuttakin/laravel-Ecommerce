<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function orders(){
        return $this->belongsToMany('App\Models\Order');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function productSellCount(){
        return $this->hasOne('App\Models\ProductSellCount');
    }
}
