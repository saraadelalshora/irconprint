<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'description_ar', 'description_en', 'tag_ar', 'tag_en', 'image', 'slogen_ar','slogen_en','status',
       ];
}
