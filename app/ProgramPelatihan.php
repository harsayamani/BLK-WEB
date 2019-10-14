<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPelatihan extends Model
{
    protected $table = 'program_pelatihan';
    protected $primaryKey = 'kd_program_pelatihan';
    protected $guarded = array();
}
