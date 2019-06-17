<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    //
    protected $table='ads';
    protected $fillable =[
        'img1', 'link1', 'description1', 'status1', 'img2', 'link2', 'description2', 'status2', 'img3', 'link3', 'description3', 'status3', 'img4', 'link4', 'description4', 'status4', 'img5', 'link5', 'description5', 'status5',
    ];

}
