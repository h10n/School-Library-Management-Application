<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'username' => 'required|string|max:30|unique:users,username,'. ($this->route('user')->id ?? ''),
            'role' => 'required|exists:roles,name',            
            'photo_file' => 'image|max:5120'
        ];

        if ($this->isMethod('post')) {            
            $rules['password'] = 'required';
        }
        return $rules;
    }
}
