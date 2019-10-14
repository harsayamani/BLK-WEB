<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'konten';
    protected $primaryKey = 'kd_konten';
    protected $guarded = array();
}
