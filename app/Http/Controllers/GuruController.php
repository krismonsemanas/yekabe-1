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
        $data['periode'] = Periode::all()->pluck('full_name', 'id');
        $data['kelas'] = Kelas::pluck('kelas', 'id');
        $data['mapel'] = Mapel::pluck('mapel', 'id');
        $data['karyawan'] = Karyawan::pluck('nama', 'id');
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
        //
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
        $data['periode'] = Periode::all()->pluck('full_name', 'id');
        $data['kelas'] = Kelas::pluck('kelas', 'id');
        $data['mapel'] = Mapel::pluck('mapel', 'id');
        $data['karyawan'] = Karyawan::pluck('nama', 'id');
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
        //
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
