<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Session;

class StorePublisherRequest extends FormRequest
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
            'name' => 'required|unique:publishers'
        ];
    }

  /*  protected function failedValidation(Validator $validator)
    {
      Session::flash("flash_notification",[
        "level" => "danger",
        "message" => "Penerbit sudah ada!"
      ]);
      return parent::failedValidation($validator);
    } */

}
