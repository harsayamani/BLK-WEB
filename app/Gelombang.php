<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gelombang extends Model
{
    protected $table = 'gelombang';
    protected $primaryKey = 'kd_gelombang';
    protected $guarded = array();
}
