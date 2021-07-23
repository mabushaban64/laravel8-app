<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use App\Traits\MetronicPaginate;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles,SoftDeletes,MetronicPaginate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'email',
        'password',
        'birthday',
        'gender',
        'street_address',
        'postal_code',
        'city',
        'state',
        'country',
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

    /* public function getPermissions()
    {
        return $this->belongsToMany(Permission::class,'user_permissions','user_id','permission_id');

    } */



    public function getAvatarAttribute($image){

        if($image){
            $image = Storage::url('public/users/'.$image.'');
          // return $image;
           return $image;
        }else{
            $image = Storage::url('public/default/default.jpg');
            return $image;
        }
    }

    /* public function hasPerm($perm){

        return  $perm = Permission::select('*')
                                    ->join('permission_roles', 'permission_roles.perm_id', '=', 'permissions.id')
                                    ->join('user_roles', 'user_roles.role_id', '=', 'permission_roles.role_id')
                                    ->where('permissions.name','=', $perm)
                                    ->where('user_roles.user_id','=', $this->id)
                                    ->count();

        /* return  $perm = Permission::select('*')
                            ->join('user_permissions', 'user_permissions.permission_id', '=', 'permissions.id')
                            ->where('permissions.name','=', $perm)
                            ->where('user_permissions.user_id','=', $this->id)
                            ->count();
     } */

     /* public function roles()
    {
        return $this->belongsToMany(Role::class,'user_roles','user_id','role_id');//  classname , table name, column name in table belong to this model , another coulmn

    } */


}
