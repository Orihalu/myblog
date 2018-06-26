<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;


    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function posts() {
      return $this->hasMany('App\Post');
    }

    public function comments() {
      return $this->hasMany('App\Comment');
    }
//管理者かどうか調べる
    public function isAdmin() {
      return $this->role == config('admin_role');
    }

    // protected static function boot() {
    //   parent::boot();
    //   static::created (function($user) {
    //     $user->assignRole(config('auth.defaults.role'));
    //   });
    //
}
