<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Periode;
use App\Karyawan;
use App\Kelas;
use App\Mapel;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['guru'] = Guru::where('active',1)->get();
        return view('beken.guru.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['periode'] = Periode::all()->where('stats',1)->pluck('full_name', 'id');
        $data['kelas'] = Kelas::where('stats',1)->pluck('kelas', 'id');
        $data['mapel'] = Mapel::where('stats',1)->pluck('mapel', 'id');
        $data['karyawan'] = Karyawan::join('login_app','login_app.id','=','karyawan.id_login')->where('login_app.status', 'ACTIVE')->where('karyawan.stats',1)->pluck('nama', 'karyawan.id');
        return view('beken.guru.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate form input data guru
        $request->validate([
            'periode_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'karyawan_id' => 'required'
        ]);
        // cek data apakah data sudah ada di db
        $cekRow = Guru::where([
            'periode_id' => $request->periode_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'karyawan_id' => $request->karyawan_id,
            'active' => '1'
        ])->first();
        if($cekRow){
            return redirect('/manage/guru')->with('gagal','Tidak bisa ditambahkan, Data sudah ada');
        }
    	Guru::create($request->all());
        return redirect('manage/guru')->with('new','Data Baru Telah Dibuat.');
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
        $data['periode'] = Periode::all()->where('stats',1)->pluck('full_name', 'id');
        $data['kelas'] = Kelas::where('stats',1)->pluck('kelas', 'id');
        $data['mapel'] = Mapel::where('stats',1)->pluck('mapel', 'id');
        $data['karyawan'] = Karyawan::join('login_app','login_app.id','=','karyawan.id_login')->where('login_app.status', 'ACTIVE')->where('karyawan.stats',1)->pluck('nama', 'karyawan.id');
        $data['guru'] = Guru::findOrFail($id);
        return view('beken.guru.edit', $data);
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
        // validasi sebelum di update
         $request->validate([
            'periode_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'karyawan_id' => 'required'
        ]);
        // cek data apakah data sudah ada di db
       // cek data apakah data sudah ada di db
        $cekRow = Guru::where([
            'periode_id' => $request->periode_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'karyawan_id' => $request->karyawan_id,
            'active' => '1'
        ])->first();
        if($cekRow){
            return redirect('/manage/guru')->with('gagal','Tidak bisa update, Data sudah ada');
        }
        //proses update
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        return redirect('manage/guru')->with('edit','Data Telah Diubah.');
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
        $guru = Guru::findOrFail($id)->update(['active' => '0']);
        return redirect('manage/guru')->with('delete','Data Telah Dihapus.');
    }
}
