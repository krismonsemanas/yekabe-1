<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    //
    protected $table = 'kelas';

    protected $fillable = [
        'kelas',
        'stats',
        'created_at',
        'updated_at'
    ];

    public function Guru() {
        return $this->hasMany('App\Guru','kelas_id');
    } 

    public function Wali() {
        return $this->hasMany('App\Wali','kelas_id');
    }
}
