<?php

namespace App\Http\Requests;
use App\Book;

class UpdateBookRequest extends StoreBookRequest
{

    public function rules()
    {
      $book = Book::find($this->route('book'));
      $rules = parent::rules();
      $rules['title'] = 'required|string|max:150|unique:books,title,'.$this->route('book');
      $rules['no_induk'] =  'required|string|max:20|unique:books,no_induk,'.$this->route('book');
      $rules['amount'] = 'required|numeric|digits_between:1,10|min:'.$book->borrowed;
      return $rules;
    }


}
