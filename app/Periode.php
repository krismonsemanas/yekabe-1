<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    //
    protected $table = 'periode';

    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'stats',
        'created_at',
        'updated_at'
    ];

    public function Guru() {
        return $this->hasMany('App\Guru','periode_id');
    }

    public function Siswa() {
        return $this->hasMany('App\Murid','periode_id');
    }

    public function Absen() {
        return $this->hasMany('App\Absen','periode_id');
    }

    public function Wali() {
        return $this->hasMany('App\Wali','periode_id');
    }

    public function getFullNameAttribute()
    {
        return $this->tahun_ajaran . ' Semester ' . $this->semester;
    }

    public function periode()
    {
        return $this->semester." - ".$this->tahun_ajaran;
    }
}
