<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    //
    protected $table = 'jadwal';

    protected $fillable = [
        'periode_id',
        'kelas_id',
        'mapel_id',
        'hari',
        'jam',
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

      public function Mapel() {
        return $this->belongsTo('App\Mapel','mapel_id');
      }
}
