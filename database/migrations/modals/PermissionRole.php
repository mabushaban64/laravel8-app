<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;
    protected $table = 'permission_roles';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable =['perm_id','role_id'];
}
