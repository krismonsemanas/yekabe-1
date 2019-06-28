<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    //
    protected $table = 'guru';

    protected $fillable = [
      'periode_id',
      'kelas_id',
      'mapel_id',
      'karyawan_id',
      'active',
      'created_at',
      'updated_at'
    ];

    public function Periode() {
      return $this->belongsTo('App\Periode','periode_id');
    }

    public function Kelas() {
      return $this->belongsTo('App\Kelas','kelas_id');
    }

    public function Mapel() {
      return $this->belongsTo('App\Mapel','mapel_id');
    }

    public function Karyawan() {
      return $this->belongsTo('App\Karyawan','karyawan_id');
    }

}
