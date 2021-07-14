<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    /* public function getUsers()
    {
        return $this->belongsToMany(User::class,'user_permissions','permission_id','user_id');//  classname , table name, column name in table belong to this model , another coulmn
    } */

    /* public function roles()
    {
        return $this->belongsToMany(Role::class,'permission_roles','perm_id','role_id');//  classname , table name, column name in table belong to this model , another coulmn

    } */
}
