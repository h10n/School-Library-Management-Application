<?php

namespace App\Http\Requests;
use App\Category;
class UpdateCategoryRequest extends StoreCategoryRequest
{

    public function rules()
    {
      $rules = parent::rules();
      // $rules['classification_code'] = 'required|unique:categories,classification_code,'.$this->route('category').',classification_code'; //route('category') ngambil dari url, jika primary key bukan id maka definiskan parameter ke 4 dengan field yg dimaskud
      $rules['name'] = 'required|string|max:80|unique:categories,name,'.$this->route('category');
      return $rules;
    }


}
