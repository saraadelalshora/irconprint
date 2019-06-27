<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopImage extends Model
{
    //
    protected $table="shopimages";
    protected $fillable =[
        'product_id', 'img',
    ];

    public function product(){
        return $this->belongsTo('App\ShopProducts','product_id','id');
    }
}
