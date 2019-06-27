<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en',
         'image', 'slogen_ar', 'slogen_en', 'status','type',
    ];

    public function subcategories(){
        return $this->hasMany('App\Sub_Category');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
    public function eshops(){
        return $this->hasMany('App\ShopProducts','category_id','id');
    }
    // 
    public function videos(){
        return $this->hasMany('App\Video');
    }
    public function trainings(){
        return $this->hasMany('App\Training');
    }
}
