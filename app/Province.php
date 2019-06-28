<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    //
    protected $table = 'location_province';

    protected $fillable = [
      //nope
    ];

    public function Karyawan() {
        return $this->hasMany('App\Karyawan','province_id','province_id');
    } 

    public function Siswa() {
      return $this->hasMany('App\Siswa','province_id','province_id');
  } 

    public function Village() {
      return $this->hasMany('App\Village','village_province_id');
    }

    public function City() {
      return $this->hasMany('App\City','city_province_id');
    }

}
