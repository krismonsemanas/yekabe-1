<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    //
    protected $table = 'karyawan';

    protected $fillable = [
        'nama',
        'nip',
        'kelamin',
        'agama',
        'tempat_lahir',
        'tanggal_lahir',
        'email',
        'phone',
        'alamat',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
        'kode_pos',
        'tmt',
        'sk_pertama',
        'nuptk',
        'nrg',
        'sertifikat_pendidik',
        'kode_sertifikat_mp',
        'ijazah_terakhir',
        'nomor_ijazah',
        'jurusan',
        'program_studi',
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

    public function Guru() {
      return $this->hasMany('App\Guru','karyawan_id');
    }  

    public function Wali() {
      return $this->hasMany('App\Kayawan','karyawan_id');
    }

}
