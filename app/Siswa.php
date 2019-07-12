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
        'id_login',
        'photo',
        'stats',
        'created_at',
        'updated_at',
        'no_hp_ortu_1',
        'no_hp_ortu_2'
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

    public function nilai()
    {
      return $this->hasMany('App\Nilai');
    }

    public function Absen() {
        return $this->hasMany('App\Absen','data_murid_id');
    }

    public function Murid() {
        return $this->hasMany('App\Murid','siswa_id');
    }
    public function user(){
        return $this->belongsTo('App\User','id_login');
    }
    public function orangtua(){
        return $this->hasOne('App\OrangTua','data_murid_id');
    }
}
