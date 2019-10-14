<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';
    protected $primaryKey = 'kd_link';
    protected $guarded = array();
}
