<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    //
    protected $table = 'data_murid';

    protected $fillable = [
        'nama',
        'nisn',
        'kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'phone',
        'alamat',
        'ayah',
        'ibu',
        'wali',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'kode_pos',
        'photo',
        'stats',
        'created_at',
        'updated_at'
    ];

    public function City() {
        return $this->belongsTo('App\City','city_id','city_id');
    }

    public function District() {
      return $this->belongsTo('App\District','district_id','district_id');
    }

    public function Province() {
      return $this->belongsTo('App\Province','province_id','province_id');
    }

    public function Village() {
      return $this->belongsTo('App\Village','village_id','village_id');
    }

    public function Absen() {
        return $this->hasMany('App\Absen','data_murid_id');
    }
    public function Murid() {
        return $this->hasMany('App\Murid','siswa_id');
    }

}
