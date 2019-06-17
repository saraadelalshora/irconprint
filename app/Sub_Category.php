<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    //
    protected $table='sub__categories';
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 
        'tag_en', 'image', 'status', 'slogen_ar', 'slogen_en','category_id'
    ];


   
    public function category(){
        return $this->belongsTo('App\Category');
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
