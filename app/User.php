<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='login_app';

    protected $fillable = [
        'username', 'password','level','status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function karyawan()
    {
        return $this->hasOne('App\Karyawan','id_login');
    }

    /**
     * Password belum Hash
     *
     * @var plainpassword
     */
    public function gantiPassword($plainpassword)
    {
        $this->password = bcrypt($plainpassword);
        $this->save();
        return $this;
    }

    public function siswa()
    {
        return $this->hasOne('App\User','id_login');
    }

}
