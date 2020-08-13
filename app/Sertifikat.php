<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    protected $table = 'sertifikat';
    protected $primaryKey = 'kd_sertifikat';
    protected $fillable = ['kd_sertifikat', 'kd_pengguna', 'kd_program', 'tgl_terbit', 'tgl_kadaluarsa'];
    public $incrementing = false;

    public function member()
    {
        return $this->belongsTo('App\Member', 'kd_pengguna');
    }

    public function program()
    {
        return $this->belongsTo('App\ProgramPelatihan', 'kd_program');
    }
}
