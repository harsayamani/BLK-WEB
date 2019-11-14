<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkemaPelatihan extends Model
{
    protected $table = 'skema_pelatihan';
    protected $primaryKey = 'kd_skema';
    protected $guarded = array();
}
