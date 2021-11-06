<?php

namespace App\Http\Requests;
use App\Category;
class UpdateCategoryRequest extends StoreCategoryRequest
{

    public function rules()
    {
      $rules = parent::rules();      
      $rules['name'] = 'required|string|max:80|unique:categories,name,'.$this->route('category');
      return $rules;
    }


}
