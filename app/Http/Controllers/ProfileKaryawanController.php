<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Profil\KaryawanRequest;
use App\Http\Requests\Profil\KaryawanUbahPasswordRequest as UbahPasswordRequest;
use App\Province;
use App\Karyawan;
use App\City;
use App\District;
use App\Village;
use Storage;

class ProfileKaryawanController extends Controller
{


    public function edit()
    {
        $province = Province::all();
        $user = Auth::user()->load('karyawan');
        $city = City::where('city_province_id',$user->karyawan->province_id)->get();
        $district = District::where('district_city_id',$user->karyawan->city_id)->get();
        $village = Village::where('village_district_id',$user->karyawan->district_id)->get();
        return view('is_guru.profile',compact(['user','province','city','district','village']));
    }

    public function update(KaryawanRequest $request)
    {
        $dataProfil = $request->validated();
        $user = Auth::user()->load('karyawan');

        if($request->hasFile('photo')){
            $exist = Storage::disk('photo')->exists($user->karyawan->photo);
            if(isset($user->karyawan->photo) && $exist) {
                $delete = Storage::disk('photo')->delete($user->karyawan->photo);
            }
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/teacher';
                $request->file('photo')->move($upload_path,$photo_name);
                $dataProfil['photo'] = $photo_name;
            }
        }

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
