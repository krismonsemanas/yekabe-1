<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wali extends Model
{
    //
    protected $table = 'wali';

    protected $fillable = [
      'periode_id',
      'karyawan_id',
      'kelas_id',
      'stats',
      'created_at',
      'updated_at'
    ];

    public function Periode() {
      return $this->belongsTo('App\Periode','periode_id');
    }

    public function Kelas() {
      return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function Karyawan() {
      return $this->belongsTo('App\Karyawan','karyawan_id');
    }

}
