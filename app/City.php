<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table = 'location_city';

    protected $fillable = [
      //nope
    ];

    public function Karyawan() {
        return $this->hasMany('App\Karyawan','city_id','city_id');
    } 

    public function siswa() {
      return $this->hasMany('App\Siswa','city_id','city_id');
  } 

    public function Province() {
      return $this->belongsTo('App\Province','city_province_id');
    }

    public function Village() {
      return $this->hasMany('App\Village','village_city_id');
    }

    public function District() {
      return $this->belongsTo('App\District','district_city_id');
    }

}
