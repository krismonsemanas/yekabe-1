<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bobot extends Model
{

    protected $table = 'bobot_nilai';
    protected $fillable = ['nama','persentase'];
    //
    protected $table = 'bobot_nilai';

    protected $fillable = [
        'nama',
        'persentase',
        'created_at',
        'updated_at'
    ];

}
