<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Permission;
use App\Models\UserPermission;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getPermissions()
    {
        return $this->belongsToMany(Permission::class,'user_permissions','user_id','permission_id');

    }

    public function hasPerm($perm){
                                                
        return  $perm = Permission::select('*')
                            ->join('user_permissions', 'user_permissions.permission_id', '=', 'permissions.id')
                            ->where('permissions.name','=', $perm)
                            ->where('user_permissions.user_id','=', $this->id)
                            ->count();

                            
                            
 
     }


}
