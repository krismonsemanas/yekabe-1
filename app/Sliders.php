<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliders extends Model
{
    // defenisikan tabel di dalam db
    protected $table = 'slider_app';
    // defenisikan filed
    protected $fillable = ['foto'];
}
