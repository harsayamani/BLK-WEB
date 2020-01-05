<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $table = 'member';
    protected $primaryKey = 'kd_pengguna';
    protected $guarded = array();
    // public $incrementing = false;

    // protected $hidden = [
    //   'password','remember_token'
    // ];

    // public function setPasswordAttribute($value)
    // {
    //   $this->attributes['password'] = bcrypt($value);
    // }
}
