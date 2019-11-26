<?php

namespace App\Http\Requests;

class UpdatePublisherRequest extends StorePublisherRequest
{

    public function rules()
    {
      $rules = parent::rules();
      $rules['name'] = 'required|string|max:100|unique:publishers,name,'.$this->route('publisher');
      return $rules;
    }


}
