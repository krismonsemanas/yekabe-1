<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    //
    protected $table = 'absent';

    protected $fillable = [
        'periode_id',
        'kelas_id',
        'mapel_id',
        'karyawan_id',
        'data_murid_id',
        'jadwal',
        'created_at',
        'status',
        'keterangan',
        'updated_at',
        'active'
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

      public function Siswa() {
        return $this->belongsTo('App\Siswa','data_murid_id');
      }
}
