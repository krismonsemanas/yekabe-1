<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //
    protected $table = 'location_district';

    protected $fillable = [
      //nope
    ];

    public function Karyawan() {
        return $this->hasMany('App\Karyawan','district_id','district_id');
    } 

    public function Siswa() {
      return $this->hasMany('App\Siswa','district_id','district_id');
  } 

    public function Village() {
      return $this->hasMany('App\Village','village_district_id');
    }

    public function City() {
      return $this->belongsTo('App\City','district_city_id');
    }

}
