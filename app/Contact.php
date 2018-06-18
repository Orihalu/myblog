<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
      'email', 'type', 'gender', 'body'
    ];

    //
    // static $types = [
    //   'listについて', 'commentについて', 'userについて'
    // ];
    //
    // static $genders = [
    //   '男', '女'
    // ];
}
