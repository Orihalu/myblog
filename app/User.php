<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
<<<<<<< HEAD
//管理者かどうか調べる
    public function isAdmin() {
      return $this->id == config('admin_id');
    }

    // protected static function boot() {
    //   parent::boot();
    //   static::created (function($user) {
    //     $user->assignRole(config('auth.defaults.role'));
    //   });
    //
=======
    // user_idからuser_name
    // public function getUsername($user_id) {
    //   return
    // }

    public function isAdmin() {
      return $this->id === config('admin_id');
    }
>>>>>>> 981499a6d708467ce2e1e41f15d86eaeb882b97c
}
