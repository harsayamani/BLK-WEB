<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    protected $primaryKey = 'kd_media';
    protected $fillable = ['kd_media', 'nama_media'];

    public function galeri() {
        return $this->hasMany('App\Galeri', 'kd_media');
    }
}
