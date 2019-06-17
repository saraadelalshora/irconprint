<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categoryNewSite extends Model
{
    //
    protected $table = "category_new_newsite";
    protected $fillable =[
        'category_id', 'newsite_id'
    ];
}
