<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable =[
        'title_ar', 'title_en', 'description_en', 'description_ar', 'status', 'slogen_ar', 'slogen_en', 'img'
       ];
   
}
