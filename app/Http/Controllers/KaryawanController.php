<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use App\Karyawan;
use App\Province;
use App\City;
use App\District;
use App\Village;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['karyawan'] = Karyawan::where('stats',1)->get();
        return view('beken.karyawan.index',$data);
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
        return view('beken.karyawan.create',$data);
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
            'nama' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string','min:8', 'max:255','unique:login_app'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:karyawan'],
            'password' => ['required', 'string', 'min:8'],
            'password_conf' => ['required','same:password'],
            'phone' => ['required', 'numeric','unique:karyawan'],
            'province_id' => ['required'],
            'city_id' => ['required'],
            'district_id' => ['required'],
            'village_id' => ['required'],
            'nip' => ['required','numeric'],
            'kode_pos' => ['required','numeric'],
            'tmt' => ['required'],
            'kelamin' => ['required'],
            'sk_pertama' => ['required'],
            'nuptk' => ['required'],
            'agama' => ['required'],
            'nrg' => ['required'],
            'sertifikat_pendidik' => ['required'],
            'kode_sertifikat_mp' => ['required'],
            'tempat_lahir' => ['required'],
            'tanggal_lahir' => ['required'],
            'ijazah_terakhir' => ['required'],
            'alamat' => ['required'],
            'nomor_ijazah' => ['required'],
            'jurusan' => ['required'],
            'program_studi' => ['required'],
            'photo' => 'required|image|max:2000|mimes:jpg,jpeg,png'
        ]);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'level' => 'GURU',
            'status' => 'ACTIVE',
        ]);
        $getId = User::orderBy('id','desc')->first();
        $input = $request->all();
        $input['id_login'] = $getId['id'];
        $input['tanggal_lahir'] = date('Y-m-d',strtotime($input['tanggal_lahir']));
        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/teacher';
                $request->file('photo')->move($upload_path,$photo_name);
                $input['photo'] = $photo_name;
            }
        }
    	Karyawan::create($input);
        return redirect('manage/karyawan')->with('new','Data Baru Telah Dibuat.');
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
        $data['karyawan'] = Karyawan::findOrFail($id);
        $data['province'] = Province::all();
        $data['city'] = City::where('city_province_id',$data['karyawan']['province_id'])->get();
        $data['district'] = District::where('district_city_id',$data['karyawan']['city_id'])->get();
        $data['village'] = Village::where('village_district_id',$data['karyawan']['district_id'])->get();
        $data['karyawan']['tanggal_lahir'] = date('m/d/Y',strtotime($data['karyawan']['tanggal_lahir']));
        return view('beken.karyawan.edit', $data);
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
        $karyawan = Karyawan::findOrFail($id);
        $input = $request->all();

        $input['tanggal_lahir'] = date('Y-m-d',strtotime($input['tanggal_lahir']));
        if($request->hasFile('photo')){
            $exist = Storage::disk('photo')->exists($karyawan->photo);
            if(isset($karyawan->photo) && $exist) {
                $delete = Storage::disk('photo')->delete($karyawan->photo);
            }
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            if($request->file('photo')->isValid()){
                $photo_name = date('YmdHis').".$ext";
                $upload_path = 'photo/teacher';
                $request->file('photo')->move($upload_path,$photo_name);
                $input['photo'] = $photo_name;
            }
        }
        $karyawan->update($input);
        return redirect('manage/karyawan')->with('edit','Data Telah Diubah.');
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
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->update(['stats' => '0']);
        return redirect('manage/karyawan')->with('delete','Data Telah Dihapus.');
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
