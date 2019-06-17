<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustRole;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Role extends Model
{
    use EntrustUserTrait;
    //
    protected $fillable =[
        'name', 'display_name', 'description',
    ];
    public function permision()
    {
        return $this->belongsToMany('App\Permission');
    }
    public function users()
    {
        return $this->belongsToMany('App\User','role_user','role_id','user_id');
    }

}
