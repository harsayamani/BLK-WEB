<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'kd_galeri';
    protected $fillable = ['kd_galeri', 'url_galeri', 'kd_media'];

    public function media()
    {
        return $this->belongsTo('App\Media', 'kd_media');
    }
}
