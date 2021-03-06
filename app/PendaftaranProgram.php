<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PendaftaranProgram extends Model
{
    protected $table = 'pendaftaran_program';
    protected $primaryKey = 'kd_pendaftaran';
    protected $fillable = ['kd_pendaftaran', 'kd_pengguna', 'kd_skema', 'status'];

    public function member()
    {
        return $this->belongsTo('App\Member', 'kd_pengguna');
    }

    public function skema()
    {
        return $this->belongsTo('App\SkemaPelatihan', 'kd_skema');
    }
}
