<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = ['id','id_provinsi', 'provinsi', 'nama', 'type', 'kodepos'];

    public function kabupatenKota() {
        return $this->hasMany('App\Member', 'kabupaten_kota');
    }

    public function tempatLahir() {
        return $this->hasMany('App\Member', 'tempat_lahir');
    }
}
