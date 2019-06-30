<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    protected $table = "murid";
    protected $fillable = ['periode_id','kelas_id','mapel_id','siswa_id','active'];

    public function siswa()
    {
        return $this->belongsTo('App\Siswa');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function nilai()
    {
        return $this->hasMany('App\Nilai');
    }
}
