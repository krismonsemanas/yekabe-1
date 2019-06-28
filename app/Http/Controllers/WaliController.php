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
        //
        $data['periode'] = Periode::all()->pluck('full_name', 'id');
        $data['kelas'] = Kelas::pluck('kelas', 'id');
        $data['guru'] = Karyawan::all()->pluck('nama', 'id');
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
        //
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
        $data['periode'] = Periode::all()->pluck('full_name', 'id');
        $data['kelas'] = Kelas::pluck('kelas', 'id');
        $data['guru'] = Karyawan::all()->pluck('nama', 'id');
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
        //
        $guru = Guru::findOrFail($id);
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
