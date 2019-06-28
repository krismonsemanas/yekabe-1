<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengumuman extends Model
{
    //
    protected $table = 'pengumuman';

    protected $fillable = [
        'judul',
        'isi',
        'status',
        'sampai',
        'created_at',
        'updated_at'
    ];
}
