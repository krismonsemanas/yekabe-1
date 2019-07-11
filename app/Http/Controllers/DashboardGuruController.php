<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Periode;
use App\Guru;
use App\Jadwal;
use App\Karyawan;
use App\Murid;

class DashboardGuruController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $periode = Periode::where('stats',1)->get()->last();
        $karyawan = Karyawan::where('id_login',$user_id)->first();
        $mapel = Guru::where('periode_id',$periode->id)->where('karyawan_id',$karyawan->id)->pluck('mapel_id');
        $data['countmapel'] = $mapel->count();
        $kelas = Guru::where('periode_id',$periode->id)->where('karyawan_id',$karyawan->id)->pluck('kelas_id');
        $data['countkelas'] = $kelas->count();
        $data['jadwal'] = Jadwal::where('periode_id',$periode->id)->whereIn('mapel_id',$mapel)->whereIn('kelas_id',$kelas)->orderBy('hari','ASC')->get();
        $murid = Murid::where('periode_id',$periode->id)->whereIn('mapel_id',$mapel)->whereIn('kelas_id',$kelas)->get();
        $data['countmurid'] = $murid->count();
        return view('is_guru.dashboard',$data);
    }
}
