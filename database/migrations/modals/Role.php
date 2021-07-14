<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    /* public function permissions()
    {
        return $this->belongsToMany(Permission::class,'permission_roles','role_id','perm_id');//  classname , table name, column name in table belong to this model , another coulmn
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'user_roles','role_id','user_id');//  classname , table name, column name in table belong to this model , another coulmn
    } */
}
