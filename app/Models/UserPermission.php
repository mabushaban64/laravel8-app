<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    use HasFactory;

    protected $table = 'user_permissions';

    public $timestamps = false;

    public $incrementing = false;

    protected $fillable =['user_id','permission_id'];
}
