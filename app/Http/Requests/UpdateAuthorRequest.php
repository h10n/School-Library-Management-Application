<?php

namespace App\Http\Requests;

class UpdateAuthorRequest extends StoreAuthorRequest
{

    public function rules()
    {
      $rules = parent::rules();
      $rules['name'] = 'required|string|max:100|unique:authors,name,'.$this->route('author');
      $rules['singkatan'] = 'max:10';
      return $rules;
    }


}
