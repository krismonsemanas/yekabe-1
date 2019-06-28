<?php

namespace App\Http\Requests\Profil;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\OldPasswordMatch;

class KaryawanUbahPasswordRequest extends FormRequest
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
            'old_password' => ['required','string',new OldPasswordMatch],
            'new_password' => 'required|string|different:old_password|confirmed|min:6'
        ];
    }

    public function attributes()
    {
        return [
            'old_password' => 'Password Lama',
            'new_password' => 'Password Baru'
        ];
    }
}
