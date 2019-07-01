<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Nilai extends Model
{
    protected $fillable = ['periode_id','kelas_id','mapel_id','karyawan_id','data_murid_id','nilai','bobot_id'];
    protected $table = 'nilai';

    public function periode()
    {
        return $this->belongsTo('App\Periode');
    }

    public function kelas()
    {
        return $this->belongsTo('App\Kelas');
    }

    public function mapel()
    {
        return $this->belongsTo('App\Mapel');
    }

    public function siswa()
    {
        return $this->belongsTo('App\Siswa','data_murid_id');
    }

    public function guru()
    {
        return $this->belongsTo('App\Karyawan');
    }

    public function bobot()
    {
        return $this->belongsTo('App\Bobot','bobot_id');
    }

    public function tanggalInput()
    {
        $carbon = new Carbon($this->created_at);
        return $carbon->isoFormat('dddd, D - MMMM - Y');
    }
}
