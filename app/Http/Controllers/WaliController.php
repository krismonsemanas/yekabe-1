<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use App\Periode;
use App\Karyawan;
use App\Kelas;
use App\Wali;

class WaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['wali'] = Wali::where('stats',1)->get();
        return view('beken.wali.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // proses input
        $data['periode'] = Periode::all()->where('stats',1)->pluck('full_name', 'id');
        $data['kelas'] = Kelas::where('stats',1)->pluck('kelas', 'id');
        $data['guru'] = Karyawan::join('login_app','login_app.id','=','karyawan.id_login')->where('login_app.status', 'ACTIVE')->where('karyawan.stats',1)->pluck('nama', 'karyawan.id');
        return view('beken.wali.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi input
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
            return redirect('manage/wali')->with('gagal','Data yang anda input sudah ada');
        }
    	Wali::create($request->all());
        return redirect('manage/wali')->with('new','Data Baru Telah Dibuat.');
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
        $data['guru'] = Karyawan::join('login_app','login_app.id','=','karyawan.id_login')->where('login_app.status', 'ACTIVE')->where('karyawan.stats',1)->pluck('nama', 'karyawan.id');
        $data['wali'] = Wali::findOrFail($id);
        return view('beken.wali.edit', $data);
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
        //validasi
        $row = Wali::where([
            'periode_id' => $request->periode_id,
            'karyawan_id' => $request->karyawan_id,
            'kelas_id' => $request->kelas_id,
            ['id','!=',$id],
            'stats' => 1,
        ])->first();
        if($row){
            return redirect('manage/wali')->with('gagal','Tidak bisa di update, karena data sudah ada');
        }
        $guru = Wali::findOrFail($id);
        $guru->update($request->all());
        return redirect('manage/wali')->with('edit','Data Telah Diubah.');
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
        $wali = Wali::findOrFail($id)->update(['stats' => '0']);
        return redirect('manage/wali')->with('delete','Data Telah Dihapus.');
    }
}
