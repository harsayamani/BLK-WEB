<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriKonten extends Model
{
    protected $table = 'kategori_konten';
    protected $primaryKey = 'kd_kategori_konten';
    protected $fillable = ['kd_kategori_konten', 'nama_gelombang'];

    public function konten() {
        return $this->hasMany('App\Konten', 'kd_kategori');
    }
}
