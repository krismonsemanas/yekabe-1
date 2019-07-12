<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    protected $table = 'chat';
    protected $fillable = ['from','to','message'];
    public function user() {
        return $this->belongsTo('App\User','from');
    }
}
