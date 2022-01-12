<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VisitorMemberRequest extends FormRequest
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
            'no_anggota' => 'required|numeric|digits_between:1,20|exists:members,no_induk',            
            'keperluan' => 'required|string|max:200',
        ];
    }
}
