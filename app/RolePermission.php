<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
class RolePermission extends Model
{
    protected $table = "permission_role";
    public function ralations() {
        return $this->belongsToMany('App\Role', 'permission_role', 'permission_id', 'role_id');
    }
}