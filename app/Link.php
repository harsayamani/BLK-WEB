<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table = 'link';
    protected $primaryKey = 'kd_link';
    protected $fillable = ['kd_link', 'link', 'nama_dinas_terkait'];
}
