<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
            'title'=>'max:50',
            'text' =>'max:330',
        ];

        if ($this->isMethod('post')) {            
            $rules['img'] = 'required|image|max:5000';
        }else{
            $rules['img'] = 'image|max:5000';
        }

        return $rules;
    }
}
