<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
use Validator;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['pengumuman'] = Pengumuman::where(['kategori'=>'pengumuman'])->get();
        return view('beken.pengumuman.index',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.pengumuman.create');
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
        $input = $request->all();
        $input['sampai'] = date('Y-m-d',strtotime($input['sampai']));
    	Pengumuman::create($input);
        return redirect('manage/pengumuman')->with('new','Data Baru Telah Dibuat.');
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
        $data['pengumuman'] = Pengumuman::findOrFail($id);
        $data['pengumuman']['sampai'] = date('m/d/Y',strtotime($data['pengumuman']['sampai']));
        return view('beken.pengumuman.edit', $data);

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
        $pengumuman = Pengumuman::findOrFail($id);
        $input = $request->all();
        $input['sampai'] = date('Y-m-d',strtotime($input['sampai']));
        $pengumuman->update($input);
        return redirect('manage/pengumuman')->with('edit','Data Telah Diubah.');

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
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->update(['status' => '0']);
        return redirect('manage/pengumuman')->with('delete','Data Telah Dihapus.');
    }
}
