<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;
class BeasiswaController extends Controller
{
    /**
     * tampilkan data pengumuman beasiswa status nya aktif
     */
    public function index(){
        $data['beasiswa'] = Pengumuman::where([
            'kategori' => 'beasiswa',
        ])->get();
        return view('beken.beasiswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('beken.beasiswa.create');
    }
    /**
     * save data ke tabel pengumuman dengan kategori beasiswa
     * @param Request
     */
    public function store(Request $request){
        //validate
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'sampai' => 'required',
        ]);
        $input = $request->all();
        $input['kategori'] = 'beasiswa';
        $input['sampai'] = date('Y-m-d',strtotime($input['sampai']));
    	Pengumuman::create($input);
        return redirect('manage/beasiswa')->with('new','Data Baru Telah Dibuat.');
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
        $data['beasiswa'] = Pengumuman::findOrFail($id);
        $data['beasiswa']['sampai'] = date('m/d/Y',strtotime($data['beasiswa']['sampai']));
        return view('beken.beasiswa.edit', $data);

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
        // validate
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'sampai' => 'required',
        ]);
        $pengumuman = Pengumuman::findOrFail($id);
        $input = $request->all();
        $input['kategori'] = 'beasiswa';
        $input['sampai'] = date('Y-m-d',strtotime($input['sampai']));
        $pengumuman->update($input);
        return redirect('manage/beasiswa')->with('edit','Data Telah Diubah.');

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
        return redirect('manage/beasiswa')->with('delete','Data Telah Dihapus.');
    }
}
