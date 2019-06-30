<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Karyawan;
use App\Murid;
use App\Absen;
use Auth;
use Carbon\Carbon;


class AbsenGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user()->load('karyawan');
        $data['guru'] = Guru::where('karyawan_id',$user->karyawan->id)->where('active','1')->get();
        return view('beken.absen.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $data['guru'] = Guru::findOrFail($id);
        // $data['kelas'] = Murid::where('periode_id',$data['guru']->periode_id)->where('kelas_id',$data['guru']->kelas_id)->where('mapel_id',$data['guru']->mapel_id)->orderBy('siswa_id.nama','asc')->get();
        $data['kelas'] = Murid::join('data_murid','murid.siswa_id','=','data_murid.id')->where('periode_id',$data['guru']->periode_id)->where('kelas_id',$data['guru']->kelas_id)->where('mapel_id',$data['guru']->mapel_id)->orderBy('nama','asc')->get();
        $data['siswa'] = $data['kelas']->pluck('nama', 'id');
        // dd($data['siswa'] = $data['kelas']->siswa_id->first());
        // dd($data['kelas']);
        return view('beken.absen.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->id_guru);
        $guru = Guru::findOrFail($request->id_guru);
        // $absen = new Absen;
        // foreach( $request->status as $stats ) {
            for($i=0;$i < count($request->status);$i++) {
                // echo $request;
                $absen = new Absen;
                $absen->periode_id = $guru->periode_id;
                $absen->kelas_id = $guru->kelas_id;
                $absen->mapel_id = $guru->mapel_id;
                $absen->karyawan_id = $guru->karyawan_id;
                $absen->data_murid_id = $request->id_siswa[$i];
                $absen->jadwal = date('Y-m-d H:i:s', strtotime('+7 hours'));
                $absen->status = $request->status[$i];
                $absen->keterangan = $request->keterangan[$i];
                $absen->save();
            }
            return redirect('guru/absen/kelas/'.$guru->id)->with('new','Absen Hari Ini Telah Dilakukan.');
            // dd($request);
            // $user['created_at'] = new DateTime;
            // $user['updated_at'] = $user['created_at'];
        // }
        // User::insert($users);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $absen = Absen::findOrFail($id);
        $absen->update(['active' => '0']);
        // return redirect('manage/karyawan')->with('delete','Data Telah Dihapus.');
    }

    public function kelas($id)
    {
        //
        $data['guru'] = Guru::findOrFail($id);
        $data['absen'] = Absen::where('periode_id',$data['guru']->periode_id)->where('kelas_id',$data['guru']->kelas_id)->where('mapel_id',$data['guru']->mapel_id)->whereDate('jadwal','=',date('Y-m-d', strtotime('+7 hours')))->where('active',1)->get();
        // dd(date('Y-m-d H', strtotime('+7 hours')));
        return view('beken.absen.kelas',$data);

    }

    public function now($id)
    {
        //
        $data['guru'] = Guru::findOrFail($id);
        // $data['kelas'] = Murid::where('periode_id',$data['guru']->periode_id)->where('kelas_id',$data['guru']->kelas_id)->where('mapel_id',$data['guru']->mapel_id)->orderBy('siswa_id.nama','asc')->get();
        $data['kelas'] = Murid::join('data_murid','murid.siswa_id','=','data_murid.id')->where('periode_id',$data['guru']->periode_id)->where('kelas_id',$data['guru']->kelas_id)->where('mapel_id',$data['guru']->mapel_id)->orderBy('nama','asc')->get();
        // dd($data['siswa'] = $data['kelas']->siswa_id->first());
        // dd($data['kelas']);
        return view('beken.absen.now',$data);
    }

    public function single_store(Request $request)
    {
        //
        // $test = 'test';
        // dd($test);
        $guru = Guru::findOrFail($request->guru_id);
        $absen = new Absen;
        $absen->periode_id = $guru->periode_id;
        $absen->kelas_id = $guru->kelas_id;
        $absen->mapel_id = $guru->mapel_id;
        $absen->karyawan_id = $guru->karyawan_id;
        $absen->data_murid_id = $request->data_murid_id;
        $absen->jadwal = date('Y-m-d H:i:s', strtotime('+7 hours'));
        $absen->status = $request->status;
        $absen->keterangan = $request->keterangan;
        $absen->save();
        return redirect('guru/absen/kelas/'.$guru->id)->with('new','Absen Berhasil Ditambahkan.');

    }
}
