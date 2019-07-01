<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Nilai;
use App\Mapel;
use App\Karyawan;
use App\Guru;
use App\Kelas;
use App\Murid;
use App\Periode;
use App\Siswa;
use App\Bobot;

class NilaiController extends Controller
{
    public function index()
    {
        $periode_id = request('periode');
        $periodes = Periode::all();
        $user_id = Auth::id();
        $karyawan = Karyawan::select('id','nama','nip')->where('id_login',$user_id)->with('guru')->first();
        $guru = Guru::where('karyawan_id',$karyawan->id)
            ->where('active',1)
            ->where('periode_id',$periode_id ?? true)
            ->with(['kelas','mapel'])
            ->paginate(15);

        return view('is_guru.index_nilai',['datas' => $guru,'periode' => $periodes]);
    }

    public function siswa(Kelas $kelas,Mapel $mapel,Periode $periode)
    {
        $daftarMurid = Murid::where('periode_id',$periode->id)
            ->select('murid.*','data_murid.nama')
            ->join('data_murid','murid.siswa_id','data_murid.id')
            ->where('kelas_id',$kelas->id)
            ->where('mapel_id',$mapel->id)
            ->where('periode_id',$periode->id)
            ->get();

        return view('is_guru.daftar-siswa',compact(['kelas','mapel','periode','daftarMurid']));
    }

    public function nilai(Murid $murid)
    {
        $siswa = Siswa::select('nama')->where('id',$murid->siswa_id)->get();
        $murid->load(['mapel','periode','kelas']);
        $bobot = Bobot::all();
        $user = Auth::user()->load(['karyawan']);
        $daftarNilai = Nilai::where('periode_id',$murid->periode_id)
            ->select('nilai.*','bobot_nilai.nama','bobot_nilai.persentase')
            ->join('bobot_nilai','bobot_nilai.id','nilai.bobot_id')
            ->where('kelas_id',$murid->kelas_id)
            ->where('mapel_id',$murid->mapel_id)
            ->where('karyawan_id',$user->karyawan->id)
            ->orderBy('nama')
            ->paginate(15);
        
        return view('is_guru.daftar_nilai',compact(['daftarNilai','murid','siswa','bobot']));
    }

    public function store(Murid $murid, Request $request)
    {
        $request->validate([
            'bobot_id' => 'required|integer|exists:bobot_nilai,id',
            'nilai' => 'required|integer|between:0,100',
        ]);
        Nilai::create([
            'karyawan_id' => Auth::user()->karyawan->id,
            'data_murid_id' => $murid->siswa->id,
            'periode_id' => $murid->periode_id,
            'kelas_id' => $murid->kelas_id,
            'mapel_id' => $murid->mapel_id,
            'bobot_id' => $request->bobot_id,
            'nilai' => $request->nilai,
        ]);

        return redirect()->back()->with('success','Nilai Berhasil ditambah ');
    }

    public function edit(Nilai $nilai)
    {
        $nilai->load(['mapel','periode','bobot']);
        $siswa = Siswa::select('nama')->where('id',$nilai->data_murid_id)->first();
        $murid = Murid::where('siswa_id',$nilai->data_murid_id)
            ->where('periode_id',$nilai->periode_id)
            ->where('mapel_id',$nilai->mapel_id)
            ->where('kelas_id',$nilai->kelas_id)
            ->first();
        $bobot = Bobot::all();
        return view('is_guru.ubah_nilai',compact(['nilai','bobot','siswa','murid']));
    }

    public function update(Nilai $nilai, Request $request)
    {
        $request->validate([
            'bobot_id' => 'required|integer|exists:bobot_nilai,id',
            'nilai' => 'required|integer|between:0,100',
        ]);

        $nilai->update([
            'bobot_id' => $request->bobot_id,
            'nilai' => $request->nilai
        ]);
        return redirect()->back()->with('success','Data berhasil diperbaharui.');
    }

    public function destroy(Nilai $nilai){
        $nilai->delete();
        return redirect()->back()->with('success','Nilai berhasil dihapus.');
    }

}
