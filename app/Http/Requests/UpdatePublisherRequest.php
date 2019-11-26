<?php

namespace App\Http\Requests;

class UpdatePublisherRequest extends StorePublisherRequest
{

    public function rules()
    {
      $rules = parent::rules();
      $rules['name'] = 'required|unique:publishers,name,'.$this->route('publisher');
      return $rules;
    }


}
