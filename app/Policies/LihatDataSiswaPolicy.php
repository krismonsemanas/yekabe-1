<?php

namespace App\Policies;

use App\User;
use App\Nilai;
use Illuminate\Auth\Access\HandlesAuthorization;

class LihatDataSiswaPolicy
{
    use HandlesAuthorization;

    public function nilai(User $user, Nilai $nilai)
    {
        if($user->level == 'GURU')
        {
            return $user->karyawan->id == $nilai->karyawan_id;
        }
        return false;
    }

}
