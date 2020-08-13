<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konten extends Model
{
    protected $table = 'konten';
    protected $primaryKey = 'kd_konten';
    protected $fillable = ['kd_konten', 'judul_konten', 'isi_konten', 'kd_kategori', 'foto', 'tgl_rilis'];

    public function kategoriKonten()
    {
        return $this->belongsTo('App\KategoriKonten', 'kd_kategori');
    }
}
