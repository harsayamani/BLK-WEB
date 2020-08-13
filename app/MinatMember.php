<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MinatMember extends Model
{
    protected $table = 'minat_member';
    protected $primaryKey = 'kd_minat_member';
    protected $fillable = ['kd_minat_member', 'kd_pengguna', 'kd_minat'];

    public function member()
    {
        return $this->belongsTo('App\Member', 'kd_pengguna');
    }

    public function minat()
    {
        return $this->belongsTo('App\Minat', 'kd_minat');
    }
}
