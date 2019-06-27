<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopProducts extends Model
{
    //
    protected $table="shopproducts";
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'price', 
        'code', 'slogen_ar', 'slogen_en', 'status', 'availbale', 'category_id', 'manufactor_id',
         
    ];

    public function category(){
        return $this->belongsTo('App\Category','category_id','id');
    }
    public function manufactor(){
        return $this->belongsTo('App\Manufactor');
    }
    
    public function images(){
        return $this->hasMany('App\ShopImage','product_id','id');
    }
}
