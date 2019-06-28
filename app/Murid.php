<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    //
    protected $table = 'data_murid';

    protected $fillable = [
        'periode_id',
        'kelas_id',
        'mapel_id',
        'siswa_id',
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

      public function Siswa() {
        return $this->belongsTo('App\Karyawan','siswa_id');
      }
}
