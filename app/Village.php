<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //
    protected $table = 'location_village';

    protected $fillable = [
      //nope
    ];

    public function Karyawan() {
        return $this->hasMany('App\Karyawan','village_id','village_id');
    }

    public function Siswa() {
      return $this->hasMany('App\Siswa','village_id','village_id');
  }

    public function District() {
      return $this->belongsTo('App\District','village_district_id');
    }

    public function Province() {
      return $this->belongsTo('App\Province','village_province_id');
    }

    public function City() {
      return $this->belongsTo('App\City','village_city_id');
    }

}
