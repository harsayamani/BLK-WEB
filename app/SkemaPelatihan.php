<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkemaPelatihan extends Model
{
    protected $table = 'skema_pelatihan';
    protected $primaryKey = 'kd_skema';
    protected $fillable = ['kd_skema', 'kd_program', 'kd_gelombang', 'tgl_awal_pendaftaran', 'tgl_akhir_pendaftaran', 'tgl_seleksi', 'tgl_awal_pelaksanaan', 'tgl_akhir_pelaksaan', 'kuota'];

    public function program()
    {
        return $this->belongsTo('App\ProgramPelatihan', 'kd_program');
    }

    public function gelombang()
    {
        return $this->belongsTo('App\Gelombang', 'kd_gelombang');
    }

    public function pendaftaran() {
        return $this->hasMany('App\PendaftaranProgram', 'kd_skema');
    }
}
