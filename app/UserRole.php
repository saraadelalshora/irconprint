<?php


namespace App;
use Illuminate\Database\Eloquent\Model;
class UserRole extends Model
{
    public $timestamps = false;
    protected $table = "role_user";
}