<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufactor extends Model
{
    //
    protected $fillable =[
        'name_ar', 'name_en', 'img', 'status',
    ];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
