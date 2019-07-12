<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    //
    protected $table = 'data_orang_tua';
    protected $fillabel = [
        'id_login_app',
        'data_murid_id'
    ];
    public function user(){
        return $this->belongsTo('App\User','id_login_app');
    }
    public function siswa(){
        return $this->belongsTo('App\Siswa','data_murid_id');
    }
}
