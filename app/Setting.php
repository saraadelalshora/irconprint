<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    //
    protected $fillable =[
        'description_ar', 'description_en', 'meta_description_ar', 'meta_description_en', 'meta_tags', 'meta_title', 'notes',
         'phone', 'address', 'whatsapp', 'email', 'log_img_en', 'logo_img', 'icon_img', 'head_code', 'maintans_status',
    ];

}
