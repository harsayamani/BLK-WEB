<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';
    protected $primaryKey = 'kd_gelombang';
    protected $fillable = ['kd_gelombang', 'nama_gelombang'];

    public function skema() {
        return $this->hasMany('App\SkemaPelatihan', 'kd_gelombang');
    }
}
