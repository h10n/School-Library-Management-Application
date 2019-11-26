<?php

namespace App\Http\Requests;
use App\Book;

class UpdateBookRequest extends StoreBookRequest
{

    public function rules()
    {
      $book = Book::find($this->route('book'));
      $rules = parent::rules();
      $rules['title'] = 'required|unique:books,title,'.$this->route('book');
      $rules['amount'] = 'required|numeric|min:'.$book->borrowed;
      return $rules;
    }


}
