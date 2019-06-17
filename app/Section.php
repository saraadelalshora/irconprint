<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    //
    protected $table='sections';
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en',  'image', 'status', 'slogen_ar', 'slogen_en','page_id','order',
    ];


   
    public function page(){
        return $this->belongsTo('App\Page');
    }
}
