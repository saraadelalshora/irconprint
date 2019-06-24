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
        return $this->belongsTo('App\Sub_Category','subtwocategory_id','id');
    }
    public function products(){
        return $this->hasMany('App\Product','subtwocategory_id','id');
    }
    public function videos(){
        return $this->hasMany('App\Video','subtwocategory_id','id');
    }
    public function trainings(){
        return $this->hasMany('App\Training','subtwocategory_id','id');
    }
}
