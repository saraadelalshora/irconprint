<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable=['product_id','user_id', 'rate','comment','approved'];
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
