<?php

namespace App;

use Illuminate\Foundation\Auth\User as Model;

class Login_App extends Model
{
    protected $guarded = ['id'];

    protected $hidden = [
      'password', 'remember_token',
    ];

    public function getAuthPassword()
    {
      return $this->password;
    }
}