<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Traits\FlashNotificationTrait;
use App\Traits\UploadFileTrait;

class BooksController extends Controller
{
  use FlashNotificationTrait, UploadFileTrait;
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      $books = Book::with(['author', 'publisher', 'category'])->latest('updated_at')->get();
      return Datatables::of($books)
        ->addColumn('action', function ($book) {
          return view('datatable._book-action', [
            'model' => $book,
            'form_url' => route('books.destroy', $book->id),
            'edit_url' => route('books.edit', $book->id),
            'detail_url' => route('books.show', $book->id),
            'title' => 'Buku',
            'confirm_message' => 'Yakin ingin menghapus ' . $book->title . ' ?'
          ]);
        })
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
      ->addColumn([
        'data' => 'no_induk',
        'name' => 'no_induk',
        'title' => 'No Induk'
      ])
      ->addColumn([
        'data' => 'title',
        'name' => 'title',
        'title' => 'Judul'
      ])
      ->addColumn([
        'data' => 'author.name',
        'name' => 'author.name',
        'title' => 'Penulis'
      ])
      ->addColumn([
        'data' => 'publisher.name',
        'name' => 'publisher.name',
        'title' => 'Penerbit'
      ])
      ->addColumn([
        'data' => 'nama_kategori',
        'name' => 'nama_kategori',
        'title' => 'Kategori'
      ])
      ->addColumn([
        'data' => 'published_year',
        'name' => 'published_year',
        'title' => 'Tahun Terbit'
      ])
      ->addColumn([
        'data' => 'amount',
        'name' => 'amount',
        'title' => 'Jumlah',
        'searchable' => false
      ])
      ->addColumn([
        'data' => 'action',
        'name' => 'action',
        'title' => '',
        'orderable' => false,
        'searchable' => false
      ]);
    return view('books.index')->with(compact('html'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('books.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreBookRequest $request)
  {
    $book = Book::create($request->except('cover'));
    $this->uploadFile($request, $book, 'cover_file', 'cover', 'buku');
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Berhasil menambah $book->title"
    ]);
    return redirect()->route('books.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $book = Book::with(['Author', 'Publisher', 'Category'])->find($id);
    return view('books.show', compact('book'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $book = Book::find($id);
    return view('books.edit')->with(compact('book'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateBookRequest $request, $id)
  {
    $book = Book::find($id);
    if (!$book->update($request->all())) {
      return redirect()->back();
    }

    $this->uploadFile($request, $book, 'cover_file', 'cover', 'buku');
    Session::flash("flash_notification", [
      "level" => "success",
      "message" => "Berhasil mengubah $book->title"
    ]);

    return redirect()->route('books.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy(Request $request, $id)
  {
    $book = Book::find($id);
    if (!$book->delete()) {
      return redirect()->back();
    }
    $this->deleteFile('buku', $book->cover);

    $this->sendFlashNotification('menghapus', $book->title);
    return redirect()->route('books.index');
  }
}
