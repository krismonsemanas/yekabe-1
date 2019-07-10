<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ControllerMaps extends Controller
{
    public function index()
    {
        return view('beken.maps.index');
    }
    public function get() {
        date_default_timezone_get("Asia/Jakarta");
        $date = date('Y-m-d');
        $data = DB::table('absent_harian')->join('data_murid','data_murid.id' ,'=','absent_harian.data_murid_id')
        ->where('absent_harian.datetime_absent','like',"%$date%")->get();
        return response()->json($data);
    }
}
