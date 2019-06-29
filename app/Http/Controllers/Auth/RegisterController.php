<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Input;
use Storage;
use App\User;
use App\Karyawan;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Province;
use Symfony\Component\Routing\Loader\Configurator\Traits\RouteTrait;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
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
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'level' => 'GURU',
            'status' => 'PENDING',
        ]);
    }

    public function showRegistrationForm()
    {
        $data['province'] = Province::all();
        return view('auth.register',$data);
    }
}
