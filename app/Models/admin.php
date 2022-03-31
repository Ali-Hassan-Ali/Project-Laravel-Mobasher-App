<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// https://medium.com/@boolfalse/laravel-multi-auth-using-different-tables-part-2-admin-authentication-37d33420ab3b
class admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'admins';
    protected $guard = 'admin';
    public function role(){
        // return $this->belongsTo(AdminRole::class,'admin_role_id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
