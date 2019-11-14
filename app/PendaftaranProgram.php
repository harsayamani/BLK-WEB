<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranProgram extends Model
{
    protected $table = 'pendaftaran_program';
    protected $primaryKey = 'kd_pendaftaran';
    protected $guarded = array();
}
