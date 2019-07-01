<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use Validator;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['mapel'] = Mapel::where('stats',1)->get();
        return view('beken.mapel.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('beken.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mapel' => 'required'
        ]);
        //proses input
        $input = $request->all();
    	  Mapel::create($input);
        return redirect('manage/mapel')->with('new','Data Baru Telah Dibuat.');
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
        $data['mapel'] = Mapel::findOrFail($id);
        return view('beken.mapel.edit', $data);

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
        $mapel = Mapel::findOrFail($id);
        $input = $request->all();
        $mapel->update($input);
        return redirect('manage/mapel')->with('edit','Data Telah Diubah.');

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
        $mapel = Mapel::findOrFail($id);
        $mapel->update(['stats' => '0']);
        return redirect('manage/mapel')->with('delete','Data Telah Dihapus.');
    }
}
