<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loker extends Model
{
    protected $table = 'loker';
    protected $primaryKey = 'kd_loker';
    protected $fillable = ['kd_loker', 'judul', 'isi', 'kd_minat', 'foto', 'tgl_rilis'];

    public function minat()
    {
        return $this->belongsTo('App\Minat', 'kd_minat');
    }
}
