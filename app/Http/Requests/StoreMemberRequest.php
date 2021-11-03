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
               'no_induk' => 'required|digits_between:1,20|numeric|unique:members,no_induk',
               'name' => 'required|string|max:50|regex:/^[\pL\s]+$/u',
               'kelas' => 'nullable|string|max:10|required_unless:jenis_anggota,guru/staff|in:10,11,12',
               'jurusan' => 'nullable|string|max:20|required_unless:jenis_anggota,guru/staff',
               'jenis_anggota' => 'required|string|max:15|in:guru/staff,siswa/i',
               'address' => 'nullable|string|max:100',
               'email' => 'required|string|max:60|email|unique:members,email',
               'phone' => 'nullable|numeric|digits_between:1,20',
               'photo' => 'image|max:5120',

               'username' => 'required|string|max:30|unique:users,username',
               'password' => 'required',
         ];
     }
 }
