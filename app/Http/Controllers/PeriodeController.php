<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periode;
use Validator;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['periode'] = Periode::where('stats',1)->get();
        return view('beken.periode.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.periode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi inputan
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required'
        ]);
        // cek apakah data sudah ada
        $cek = Periode::where([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'stats' => 1
        ])->first();
        if($cek){
            return redirect('manage/periode')->with('error','Data sudah ada!');
        }
        //proses input
        $input = $request->all();
    	  Periode::create($input);
        return redirect('manage/periode')->with('new','Data Baru Telah Dibuat.');
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
        $data['periode'] = Periode::findOrFail($id);
        return view('beken.periode.edit', $data);

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
        // validasi inputan
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required'
        ]);
        // cek apakah data sudah ada
        $cek = Periode::where([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
            'stats' => 1
        ])->first();
        if($cek){
            return redirect('manage/periode')->with('error','Data sudah ada!');
        }
        //proses update
        $periode = Periode::findOrFail($id);
        $input = $request->all();
        $periode->update($input);
        return redirect('manage/periode')->with('edit','Data Telah Diubah.');

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
        $periode = Periode::findOrFail($id);
        $periode->update(['stats' => '0']);
        return redirect('manage/periode')->with('delete','Data Telah Dihapus.');
    }
}
