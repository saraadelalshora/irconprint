<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'tag_ar', 'tag_en', 'image', 'slogen_ar', 'slogen_en', 'status', 
         'category_id', 'subcategory_id',
        'subtwocategory_id' ,'type'
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
}
