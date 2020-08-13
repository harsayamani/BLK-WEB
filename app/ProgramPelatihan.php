<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramPelatihan extends Model
{
    protected $table = 'program_pelatihan';
    protected $primaryKey = 'kd_program';
    protected $fillable = ['kd_program', 'nama_program','detail_program'];

    public function skema() {
        return $this->hasMany('App\SkemaPelatihan', 'kd_program');
    }

    public function sertifikat() {
        return $this->hasMany('App\Sertifikat', 'kd_program');
    }
}
