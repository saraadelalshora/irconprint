<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'video', 
        'slogen_ar', 'slogen_en', 'status', 'category_id', 'subcategory_id', 'subtwocategory_id', 'type',
        'course_hour','course_date'
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
