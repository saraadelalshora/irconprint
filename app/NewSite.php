<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewSite extends Model
{
    //
    protected $table='news';
    protected $fillable=[
        'title_ar', 'title_en', 'description_en', 'description_ar', 
        'meta_description_en', 'meta_description_ar', 'tags', 'image', 'status','slogen_ar','slogen_en'
    ];

    public function categories(){
        return $this->belongsToMany('App\CategoryNew','category_new_newsite','newsite_id','category_id');
    }
}
