<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //['0', '1','2','3','4']
    protected $fillable =[
     'title_ar', 'title_en', 'description_en', 'description_ar', 'img', 'status', 'type', 'slogen_ar','slogen_en',
    ];
    public function sections(){
        return $this->hasMany('App\Section');
    }

}
