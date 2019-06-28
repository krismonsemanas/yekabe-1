<?php

namespace App\Http\Requests\Profil;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nama" => 'required|string|max:191',
            "nip" => 'required|numeric',
            "kelamin" => ['required',Rule::in(['LAKI-LAKI','PEREMPUAN'])],
            "agama" => ['required',Rule::in(['BUDDHA','HINDU','ISLAM','KRISTEN KATOLIK','KRISTEN PROTESTAN','KONG HU CU','AGAMA KEPERCAYAAN'])],
            "tempat_lahir" => 'required|string|max:255',
            "tanggal_lahir" => 'required|date_format:Y-m-d',
            "email" => 'required|email',
            "phone" => 'required|numeric',
            "alamat" => 'required|string|max:255',
            "province_id" => ['required',Rule::exists('location_province','province_id')],
            "city_id" => ['required',Rule::exists('location_city','city_id')],
            "district_id" => ['required',Rule::exists('location_district','district_id')],
            "village_id" => ['required',Rule::exists('location_village','village_id')],
            "kode_pos" => 'required|between:5,7',
            "tmt" => 'required|string',
            "sk_pertama" => 'required|string',
            "nuptk" => 'required|numeric',
            "nrg" => 'required|numeric',
            "sertifikat_pendidik" => 'required|string',
            "kode_sertifikat_mp" => 'required|string',
            "ijazah_terakhir" => 'required|string',
            "nomor_ijazah" => 'required|numeric',
            "jurusan" => 'required|string|max:50',
            "program_studi" => 'required|string|max:50',
        ];
    }

    public function attributes()
    {
        return [
            "province_id" => "Pronvinsi",
            "city_id" => "Kabupaten",
            "district_id" => "Kecamatan",
            "village_id" => "Kelurahan"
        ];
    }
}
