<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Permission extends Model
{
    use EntrustUserTrait;
    //
    protected $fillable =[
        'name', 'display_name', 'description',
    ];
    public function role()
    {
        return $this->belongsToMany('App\Role');
    }
}
