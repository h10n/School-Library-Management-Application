<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:100',
            'website' => 'required|string|max:60',
            'email' => 'required|email|string|max:60',
            'pengelola' => 'required|string|max:100',
            'kepala_perpustakaan' => 'required|string|max:50',
            'nip_kepala_perpustakaan' => 'nullable|numeric|digits_between:1,20',
            'about' => 'required|string|max:100',
            'denda' => 'required|numeric|digits_between:1,11',
            'durasi' => 'required|numeric|digits_between:1,11',
            'max_peminjaman' => 'required|numeric|digits_between:1,11',
            'logo' => 'image|max:5120'
        ];
    }
}
