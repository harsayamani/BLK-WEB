<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $table = 'profil';
    protected $primaryKey = 'kd_profil';
    protected $fillable = ['kd_profil', 'visi_misi', 'struktur_organisasi', 'profil_lembaga', 'alamat', 'kontak', 'email'];
}
