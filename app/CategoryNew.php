<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryNew extends Model
{
    //
    protected $table='catergories_news';
    protected $fillable=['name_ar', 'name_en', 'status', 'slogen_ar', 'slogen_en',];

    public function news(){
        return $this->belongsToMany('App\NewSite','category_new_newsite','category_id','newsite_id');
    }
   
   
}
