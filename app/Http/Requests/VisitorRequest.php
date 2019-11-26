<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorRequest extends FormRequest
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
        $rules = [
            'no_induk' => 'required|numeric|digits_between:1,20',
            'name' => 'required|string|max:50',
            'keperluan' => 'required|string|max:200',
            'jenis' => 'required|string|max:15|in:guru/staff,siswa/i,umum',
            'kelas' => 'nullable|string|max:10|required_if:jenis,siswa/i|in:X,XI,XII'
        ];
        
        return $rules;
    }
}
