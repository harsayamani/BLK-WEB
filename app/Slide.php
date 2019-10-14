<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'slide';
    protected $primaryKey = 'kd_slide';
    protected $guarded = array();
}
