<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinatMember extends Model
{
    protected $table = 'minat_member';
    protected $primaryKey = 'kd_minat_member';
    protected $guarded = array();
}
