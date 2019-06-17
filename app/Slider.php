<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //
    protected $fillable =[
        'img', 'link', 'title_ar', 'title_en',
         'short_desc_ar', 'short_desc_en', 'description_ar', 'description_en', 'status', 
    ];

}
