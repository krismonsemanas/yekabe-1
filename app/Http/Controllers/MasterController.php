<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Wali;
use App\Periode;
use App\Karyawan;
class MasterController extends Controller
{
    // tampilkan semua kelas lengkap beserta data
    public function index(){
        $data['jumKelas'] = Kelas::all()->where('stats',1);
        $data['periode'] = Periode::where([
            'stats' => 1,
        ])->orderBy('id','desc')->first();
        $data['kelas'] = Wali::join('periode','wali.periode_id','=','periode.id')
                                ->join('karyawan','karyawan.id','=','wali.karyawan_id')
                                ->select('wali.kelas_id','wali.periode_id','periode.tahun_ajaran','periode.semester','karyawan.nama')
                                ->where([
                                    'wali.stats' => 1,
                                    // 'periode_id' => $data['periode']['id']
                                ])->get();
        $data['karyawan'] = Karyawan::join('login_app','login_app.id','=','karyawan.id_login')->where([
            'login_app.status' => 'ACTIVE',
            'karyawan.stats' => 1
            ])->select('nama','karyawan.id')->get();
        return view('beken.mtdata.index',$data);
    }
    public function store(Request $request){
        $request->validate([
            'periode_id' => 'required',
            'karyawan_id' => 'required',
            'kelas_id' => 'required',
        ]);
        $row = Wali::where([
            'periode_id' => $request->periode_id,
            'karyawan_id' => $request->karyawan_id,
            'kelas_id' => $request->kelas_id,
            'stats' => 1,
        ])->first();
        if($row){
            return redirect('manage/master')->with('gagal','Data yang anda input sudah ada');
        }

    	Wali::create($request->all());
        return redirect('manage/master')->with('new','Data Baru Telah Dibuat.');
    }
}
