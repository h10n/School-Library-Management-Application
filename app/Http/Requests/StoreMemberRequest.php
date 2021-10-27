<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Http\FormRequest;

class StoreMemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
     {
         return Auth::check();
     }

     /**
      * Get the validation rules that apply to the request.
      *
      * @return array
      */
     public function rules()
     {
         return [
               'no_induk' => 'required|numeric|unique:members,no_induk',
               'name' => 'required|regex:/^[\pL\s]+$/u',
            //    'address' => 'required',
               'email' => 'required|email|unique:members,email',
            //    'phone' => 'required|numeric',
               'photo' => 'image|max:2048',
               'username' => 'required',
               'password' => 'required'
         ];
     }
 }
