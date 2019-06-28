<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Profil\KaryawanRequest;
use App\Http\Requests\Profil\KaryawanUbahPasswordRequest as UbahPasswordRequest;
use App\Province;
use App\Karyawan;

class ProfileKaryawanController extends Controller
{


    public function edit()
    {
        $province = Province::all();
        $user = Auth::user()->load('karyawan');
        return view('is_guru.profile',compact(['user','province']));
    }

    public function update(KaryawanRequest $request)
    {
        $dataProfil = $request->validated();
        $user = Auth::user()->load('karyawan');
        $user->karyawan->update($dataProfil);
        return redirect()->back()->with('success','Data berhasil diperbaharui');
    }

    public function editPassword()
    {
        return view('is_guru.ubah_password');
    }

    public function updatePassword(UbahPasswordRequest $request)
    {
        $user = Auth::user()->load('karyawan');
        $user->gantiPassword($request['new_password']);
        return redirect()->back()->with('success','Password berhasil diperbaharui.');
    }
}
