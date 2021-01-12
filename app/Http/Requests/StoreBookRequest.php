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
              'title' => 'required|unique:books,title',
              'author_id' => 'required|exists:authors,id',
              'published_location' => 'required|string',
              'publisher_id' => 'required|exists:publishers,id',
              'published_year' => 'required|date_format:Y',
              'book_year' => 'required|date_format:Y',
              'category_id' => 'required|exists:categories,id',
              'initial' => 'required|string|min:1|max:1',
              'no_induk' => 'required|unique:books,no_induk',
              'amount' => 'required|numeric',
              'cover' => 'image|max:2048'
        ];
    }
}
