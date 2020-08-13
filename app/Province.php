<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'province';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama'];

    public function member() {
        return $this->hasMany('App\Member', 'id');
    }
}
