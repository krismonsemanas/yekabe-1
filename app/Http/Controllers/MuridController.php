<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Murid;
use App\Periode;
use App\Siswa;
use App\Kelas;
use App\Mapel;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['murid'] = Murid::where('active',1)->get();
        return view('beken.murid.index',$data);

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
        $data['siswa'] = Siswa::pluck('nama', 'id');
        return view('beken.murid.create',$data);
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
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'siswa_id' => 'required',
        ]);
        // validate murid
        $cek = Murid::where([
            'periode_id' => $request->periode_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'siswa_id' => $request->siswa_id,
            'active' => 1
        ])->first();
        if($cek){
            return redirect('manage/murid')->with('error','Gagal ditambahkan, Data sudah ada!');
        }
        Murid::create($request->all());
        return redirect('manage/murid')->with('new','Data Baru Telah Dibuat.');
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
        $data['siswa'] = Siswa::pluck('nama', 'id');
        $data['murid'] = Murid::findOrFail($id);
        return view('beken.murid.edit', $data);
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
        // validasi input
        $request->validate([
            'periode_id' => 'required',
            'kelas_id' => 'required',
            'mapel_id' => 'required',
            'siswa_id' => 'required',
        ]);
        // validate murid
        $cek = Murid::where([
            'periode_id' => $request->periode_id,
            'kelas_id' => $request->kelas_id,
            'mapel_id' => $request->mapel_id,
            'siswa_id' => $request->siswa_id,
            'active' => 1
        ])->first();
        if($cek){
            return redirect('manage/murid')->with('error','Gagal di update, Data sudah ada!');
        }  //
        $murid = Murid::findOrFail($id);
        $murid->update($request->all());
        return redirect('manage/murid')->with('edit','Data Telah Diubah.');
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
        $murid = Murid::findOrFail($id)->update(['active' => '0']);
        return redirect('manage/murid')->with('delete','Data Telah Dihapus.');
    }
}
