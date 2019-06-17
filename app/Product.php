<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'price', 
        'code', 'slogen_ar', 'slogen_en', 'status', 'availbale', 'category_id', 'subcategory_id','manufactor_id',
        'subtwocategory_id' 
    ];

    public function subtwocategory(){
        return $this->belongsTo('App\SubTwoCategory');
    }
    public function subcategory(){
        return $this->belongsTo('App\Sub_Category');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function manufactor(){
        return $this->belongsTo('App\Manufactor');
    }
    
    public function images(){
        return $this->hasMany('App\Image');
    }

    
    public function comments(){
        return $this->hasMany('App\Comment');
    }
    
}
