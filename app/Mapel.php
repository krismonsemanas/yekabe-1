<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    //
    protected $table = 'mapel';

    protected $fillable = [
        'mapel',
        'stats',
        'created_at',
        'updated_at'
    ];

    public function Guru() {
        return $this->hasMany('App\Guru','mapel_id');
    }

    public function Siswa() {
        return $this->hasMany('App\Murid','mapel_id');
    }

    public function Absen() {
        return $this->hasMany('App\Absen','mapel_id');
    }
}
