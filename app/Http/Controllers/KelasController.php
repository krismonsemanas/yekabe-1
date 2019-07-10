<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['kelas'] = Kelas::where('stats',1)->get();
        return view('beken.kelas.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inpuatn
        $request->validate(['kelas' => 'required']);
        // cek data apakah data sudah ada
        $cekKelas = Kelas::where([
            'kelas' => $request->kelas,
            'stats' => 1
        ])->first();
        if($cekKelas){
            return redirect('manage/kelas')->with('error','Data kelas sudah ada');
        }
        //proses input
        $input = $request->all();
    	Kelas::create($input);
        return redirect('manage/kelas')->with('new','Data Baru Telah Dibuat.');
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
        $data['kelas'] = Kelas::findOrFail($id);
        return view('beken.kelas.edit', $data);

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
        // validasi inpuatn
        $request->validate(['kelas' => 'required']);
        // cek data apakah data sudah ada
        $cekKelas = Kelas::where([
            'kelas' => $request->kelas,
            'stats' => 1
        ])->first();
        if($cekKelas){
            return redirect('manage/kelas')->with('error','Data kelas sudah ada');
        }
        //proses update
        $kelas = Kelas::findOrFail($id);
        $input = $request->all();
        $kelas->update($input);
        return redirect('manage/kelas')->with('edit','Data Telah Diubah.');

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
        $kelas = Kelas::findOrFail($id);
        $kelas->update(['stats' => '0']);
        return redirect('manage/kelas')->with('delete','Data Telah Dihapus.');
    }
    public function jsonkelas() {
        $kelas = Kelas::all();
        return response()->json($kelas);
    }
}
