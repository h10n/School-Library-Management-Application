<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Carousel;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class GuestController extends Controller
{
  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      $books = Book::with(['author', 'publisher', 'category'])->orderBy('title')->get();
      return Datatables::of($books)
        ->addColumn('stock', function ($book) {
          return $book->stock;
        })->addColumn('cover-buku', function ($book) {
          if (!$book->cover) return '';
          return view('books.cover', ['coverbuku' => $book->cover]);
        })
        ->rawColumns(['cover-buku', 'action'])
        ->addIndexColumn()
        ->make(true);
    }

    $html = $htmlBuilder
      ->addColumn([
        'defaultContent' => '',
        'data'           => 'DT_Row_Index',
        'name'           => 'DT_Row_Index',
        'title'          => '',
        'render'         => null,
        'orderable'      => false,
        'searchable'     => false,
        'exportable'     => false,
        'printable'      => true,
        'footer'         => '',
      ])
      ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Title'])
      ->addColumn(['data' => 'stock', 'name' => 'stock', 'title' => 'Stock', 'searchable' => false])
      ->addColumn(['data' => 'author.name', 'name' => 'author.name', 'title' => 'Author'])
      ->addColumn(['data' => 'publisher.name', 'name' => 'publisher.name', 'title' => 'Publisher'])
      ->addColumn(['data' => 'category.name', 'name' => 'category.name', 'title' => 'Category'])
      ->addColumn(['data' => 'cover-buku', 'name' => 'cover-buku', 'title' => 'Cover', 'orderable' => false, 'searchable' => false]);

    $carousel = Carousel::all();

    return view('guest.index')->with(compact('html', 'carousel'));
  }
}
