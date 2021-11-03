<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreBookRequest extends FormRequest
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
        // dd(request()->all());
        return [
              'title' => 'required|string|max:150|unique:books,title',
              'author_id' => 'required|exists:authors,id',
              'publisher_id' => 'required|exists:publishers,id',
              'category_id' => 'required|exists:categories,id',
              'published_location' => 'required|string|max:50',
              'classification_code' => 'nullable|max:15|regex:/^[0-9]{1,3}(,[0-9]{3})*(\.[0-9]+)*$/',
              'source' => 'nullable|max:10|in:hadiah,pengadaan',
              'no_induk' => 'required|string|max:20|unique:books,no_induk',
              'amount' => 'required|numeric|digits_between:1,10',
              'cover' => 'image|max:5120',
              'published_year' => 'required|date_format:Y',
              'book_year' => 'nullable|date_format:Y',
              
            //   'initial' => 'required|string|min:1|max:1',
        ];
    }
}
