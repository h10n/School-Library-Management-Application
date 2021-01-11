<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Carousel;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Entrust;
use App\Visitor;
use Carbon\Carbon;

class GuestController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
        $books = Book::with(['author','publisher','category']);
        return Datatables::of($books)
        ->addColumn('stock',function($book){
          return $book->stock;
        })->addColumn('cover-buku',function($book){
          if (!$book->cover) return '';
          return view('books.cover',['coverbuku' => $book->cover]);

        })
        /*->addColumn('action',function($book){
          if (Entrust::hasRole('admin')) return '';
          return '<a class="btn btn-xs btn-primary" href="'.route('books.borrow',$book->id).'">Pinjam</a>';
        }) */
        ->rawColumns(['cover-buku','action'])->make(true);
      }

      $html = $htmlBuilder
      ->addColumn(['data' => 'title', 'name' => 'title', 'title' => 'Judul'])
      ->addColumn(['data' => 'stock', 'name' => 'stock', 'title' => 'Stok','orderable' => false, 'searchable' => false])
      ->addColumn(['data' => 'author.name', 'name' => 'author.name', 'title' => 'Penulis'])
      ->addColumn(['data' => 'publisher.name', 'name' => 'publisher.name', 'title' => 'Penerbit'])
      ->addColumn(['data' => 'category.name', 'name' => 'category.name', 'title' => 'Kategori'])
      ->addColumn(['data' => 'cover-buku', 'name' => 'cover-buku', 'title' => 'Cover','orderable' => false, 'searchable' => false]);

      $hariini = Carbon::now()->format('d');
      $todaysvisit = Visitor::whereDay('created_at', '=', $hariini)->count();
      $carousel = Carousel::all();

      return view('guest.index')->with(compact('html', 'todaysvisit', 'carousel'));
    }
}
