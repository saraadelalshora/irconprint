<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubTwoCategory extends Model
{
    //
    protected $table='subtwo_categories';
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 
        'tag_en', 'image', 'status', 'slogen_ar', 'slogen_en','subcategory_id'
    ];


   
    public function sub_category(){
        return $this->belongsTo('App\Sub_Category');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }
    public function videos(){
        return $this->hasMany('App\Video');
    }
    public function trainings(){
        return $this->hasMany('App\Training');
    }
}
