<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Minat extends Model
{
    protected $table = 'minat';
    protected $primaryKey = 'kd_minat';
    protected $fillable = ['kd_minat', 'minat'];

    public function minatMember() {
        return $this->hasMany('App\MinatMember', 'kd_minat');
    }
}
