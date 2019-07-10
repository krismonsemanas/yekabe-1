<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use App\Siswa;
use App\Province;
use App\City;
use App\District;
use App\Village;
use App\User;
use Illuminate\Support\Facades\Hash;
class ProfilSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['siswa'] = Siswa::where('stats',1)->get();
        return view('beken.siswa.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data['province'] = Province::all();
        return view('beken.siswa.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validasi tiap inputan
        $request->validate([
            'username' => ['required', 'string','min:8', 'max:255','unique:login_app'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:data_murid'],
            'password' => ['required', 'string', 'min:8'],
            'password_conf' => ['required','same:password'],
            'phone' => ['required', 'numeric','unique:data_murid'],
            'nama' => 'required|max:255',
            'nisn' => 'required|numeric|unique:data_murid',
            'kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'photo' => 'required|image|max:2000|mimes:jpg,jpeg,png',
        ]);
        // getId
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'MURID',
            'status' => 'ACTIVE',
            'no_hp' => $request->phone
        ]);
        $getId = User::orderBy('id','desc')->first();
        //proses insert
        $input = $request->all();
        $input['tanggal_lahir'] = date('Y-m-d',strtotime($input['tanggal_lahir']));
        $input['id_login'] = $getId['id'];
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/student';
                $request->file('photo')->move($upload_path,$photo_name);
                $input['photo'] = $photo_name;
            }
        }
    	Siswa::create($input);
        return redirect('manage/profil_siswa')->with('new','Data Baru Telah Dibuat.');
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
        $data['siswa'] = Siswa::findOrFail($id);
        $data['province'] = Province::all();
        $data['city'] = City::where('city_province_id',$data['siswa']['province_id'])->get();
        $data['district'] = District::where('district_city_id',$data['siswa']['city_id'])->get();
        $data['village'] = Village::where('village_district_id',$data['siswa']['district_id'])->get();
        $data['siswa']['tanggal_lahir'] = date('m/d/Y',strtotime($data['siswa']['tanggal_lahir']));
        return view('beken.siswa.edit', $data);
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
        // validasi tiap inputan
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255','unique:data_murid,email,'.$id],
            'phone' => ['required', 'numeric','unique:data_murid,phone,'.$id],
            'nama' => 'required|max:255',
            'nisn' => 'required|numeric|unique:data_murid,nisn,'.$id,
            'kelamin' => 'required',
            'agama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'ayah' => 'required',
            'ibu' => 'required',
            'alamat' => 'required',
            'kode_pos' => 'required',
            'photo' => 'required|image|max:2000|mimes:jpg,jpeg,png',
        ]);
        $siswa = Siswa::findOrFail($id);
        if($request->phone != $siswa->phone){
            // proses update no hp untuk login
            User::where('id',$siswa->id_login)->update([
                'no_hp' => $request->phone
            ]);
        }
        $input = $request->all();
        $input['tanggal_lahir'] = date('Y-m-d',strtotime($input['tanggal_lahir']));
        if($request->hasFile('photo')){
            $exist = Storage::disk('photo_siswa')->exists($siswa->photo);
            if(isset($siswa->photo) && $exist) {
                $delete = Storage::disk('photo_siswa')->delete($siswa->photo);
            }
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/student';
                $request->file('photo')->move($upload_path,$photo_name);
                $input['photo'] = $photo_name;
            }
        }
        $siswa->update($input);
        return redirect('manage/profil_siswa')->with('edit','Data Telah Diubah.');
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
        $siswa = Siswa::findOrFail($id);
        $siswa->update(['stats' => '0']);

        $user = User::where('id',$siswa->id_login);
        $user->update(['status'=>'BLOCKED']);
        return redirect('manage/profil_siswa')->with('delete','Data Telah Dihapus.');
    }
    public function jsonSiswa(){
        $siswa = Siswa::join('murid','murid.siswa_id','=','data_murid.id')->where([
            'murid.active'=>1,
            'data_murid.stats' => 1,
            ['data_murid.id','!=','murid.siswa_id']
            ])->select('data_murid.id','data_murid.nama','data_murid.nisn')->get();
        return response()->json($siswa);
    }
    public function regencies(){
        $provinces_id = Input::get('province_id');
        $regencies = City::where('city_province_id', '=', $provinces_id)->get();
        return response()->json($regencies);
    }

     public function districts(){
        $regencies_id = Input::get('regencies_id');
        $districts = District::where('district_city_id', '=', $regencies_id)->get();
        return response()->json($districts);
    }

    public function villages(){
        $districts_id = Input::get('districts_id');
        $villages = Village::where('village_district_id', '=', $districts_id)->get();
        return response()->json($villages);
    }

    public function pos(){
        $villages_id = Input::get('villages_id');
        $pos = Village::where('village_id', '=', $villages_id)->get();
        return response()->json($pos);
    }
}
