<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;
use App\Periode;
use App\Kelas;
use App\Mapel;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['jadwal'] = Jadwal::where('stats',1)->get();
        return view('beken.jadwal.index',$data);
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
        return view('beken.jadwal.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $request->validate([
            'periode_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'jam' => 'required',
            'hari' => 'required',
        ]);
        // cek data
        $cekJadwal = Jadwal::where([
            'periode_id' => $request->periode_id,
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'stats' => 1,
        ])->first();
        if($cekJadwal){
            return redirect('manage/jadwal')->with('error','Jadwal bentrok');
        }
        //proses insert
        $input = $request->all();
        $waktu = $input['jam'];
        // dd($jam);
        // $waktu = '5:40 AM';
        $jam_pm = explode(' ',$waktu);
        $jam = explode(':',$jam_pm[0]);
        if ($jam_pm[1] === "PM") {
            $jam_final = $jam[0] + 12;
            $waktu_final = $jam_final.':'.$jam[1].':00';
        } else {
            $waktu_final = $jam_pm[0].':00';
        }
        // dd($jam_pm);
        // dd($waktu_final);
        $input['jam'] = $waktu_final;
        // dd($input);
        Jadwal::create($input);
        return redirect('manage/jadwal')->with('new','Data Baru Telah Dibuat.');
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
        $data['jadwal'] = Jadwal::findOrFail($id);
        $waktu = $data['jadwal']['jam'];
        $jam = explode(':',$waktu);
        if ($jam[0] > 12) {
            $hour = $jam[0] - 12;
            $waktu_final = $hour.':'.$jam[1].' PM';
        } else {
            $waktu_final = $jam[0].':'.$jam[1].' AM';
        }
        $data['jadwal']['jam'] = $waktu_final;
        // dd($waktu_final);
        return view('beken.jadwal.edit', $data);
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
            'periode_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required',
            'jam' => 'required',
            'hari' => 'required',
        ]);
        // cek data
        $cekJadwal = Jadwal::where([
            'periode_id' => $request->periode_id,
            'mapel_id' => $request->mapel_id,
            'kelas_id' => $request->kelas_id,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'stats' => 1,
        ])->first();
        if($cekJadwal){
            return redirect('manage/jadwal')->with('error','Jadwal bentrok');
        }
        //proses update
        $input = $request->all();
        $waktu = $input['jam'];
        $jam_pm = explode(' ',$waktu);
        $jam = explode(':',$jam_pm[0]);
        if ($jam_pm[1] === "PM") {
            $jam_final = $jam[0] + 12;
            $waktu_final = $jam_final.':'.$jam[1].':00';
        } else {
            $waktu_final = $jam_pm[0].':00';
        }
        $input['jam'] = $waktu_final;
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->update($input);
        return redirect('manage/jadwal')->with('Edit','Data Telah Diubah.');
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
        $jadwal = Jadwal::findOrFail($id)->update(['stats' => '0']);
        return redirect('manage/jadwal')->with('delete','Data Telah Dihapus.');
    }
}
