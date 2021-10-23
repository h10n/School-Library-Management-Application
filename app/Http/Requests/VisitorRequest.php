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
            'no_induk' => 'required|numeric',
            'name' => 'required',
            'keperluan' => 'required',
            'jenis' => 'required',
            'kelas' => 'nullable|required_unless:jenis,guru/staff|in:X,XI,XII'
        ];
        
        return $rules;
    }
}
