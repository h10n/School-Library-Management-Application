<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Author;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use Session;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Exceptions\BookException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\BorrowLog;
use App\Traits\FlashNotificationTrait;
use App\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{
    use FlashNotificationTrait,UploadFileTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $htmlBuilder)
    {
        if ($request->ajax()) {
          $books = Book::with(['author','publisher','category'])->latest('updated_at')->get();
          return Datatables::of($books)
          ->addColumn('action',function($book){
            return view('datatable._book-action',[
              'model' => $book,
              'form_url' => route('books.destroy',$book->id),
              'edit_url' => route('books.edit',$book->id),
              'detail_url' => route('books.show',$book->id),
              'title' => 'Buku',
              'confirm_message' => 'Yakin ingin menghapus '.$book->title.' ?'
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
        Session::flash("flash_notification",[
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
      $book = Book::with(['Author','Publisher','Category'])->find($id);
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
      if(!$book->update($request->all())) return redirect()->back();
      
      $this->uploadFile($request, $book, 'cover_file', 'cover', 'buku');
      Session::flash("flash_notification", [
          "level"=>"success",
          "message"=>"Berhasil mengubah $book->title"
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
        if (!$book->delete()) return redirect()->back();        
        $this->deleteFile('buku', $book->cover);
       
        $this->sendFlashNotification('menghapus', $book->title);
        return redirect()->route('books.index');
    }

    public function borrow($id)
    {
      try {
        $book = Book::FindOrFail($id);
        Auth::user()->borrow($book);
        Session::flash("flash_notification",[
          "level" => "success",
          "message" => "berhasil meminjam buku $book->title"
        ]);
      } catch (BookException $e) {

        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => $e->getMessage()
        ]);
      } catch (ModelNotFoundException $e) {

        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => "Buku tidak Ditemukan"
        ]);
      }
      return redirect('/');
    }

    public function returnBack($book_id)
    {
      $borrowLog  = BorrowLog::where('user_id', Auth::user()->id)
      ->where('book_id', $book_id)
      ->where('is_returned', 0)
      ->first();

      if ($borrowLog) {
        $borrowLog->is_returned = true;
        $borrowLog->save();

        Session::flash("flash_notification",[
          "level" => "success",
          "message" => "Berhasil Mengembalikan ".$borrowLog->book->title
        ]);
      }
    return redirect('/home');
    }

public function export()
{
  return view('books.export');
}
public function exportPost(Request $request)
{
  $this->validate($request, [
    'author_id' => 'required',
    'type' => 'required|in:pdf,xls'
  ], [
    'author_id.required' => 'Anda belum memilih penulis. Pilih minimal 1 penulis.'
  ]);

$books = Book::whereIn('author_id', $request->get('author_id'))->get();
$handler = 'export'.ucfirst($request->get('type')); //ucfirst to capitallize first letter
return $this->$handler($books);
}
private function exportXls($books)
{
    Excel::create('Data Buku', function($excel) use ($books){
      //set property
      $excel->setTitle('Data Buku')->setCreator(Auth::user()->name);

      $excel->sheet('Data Buku', function($sheet) use ($books){
      $row = 1;
      $sheet->row($row,[
        'Judul',
        'Jumlah',
        'Stok',
        'Penulis'
      ]);
      foreach ($books as $book) {
        $sheet->row(++$row, [
          $book->title,
          $book->amount,
          $book->stock,
          $book->author->name
        ]);
      }
    });
  })->export('xls');
}
private function exportPdf($books)
{
  $pdf = PDF::loadview('pdf.books', compact('books'));
  return $pdf->download('books.pdf');
}
public function generateExcelTemplate()
{
  Excel::create('Template Import Buku', function($excel){
    $excel->setTitle('Template Import Buku')
    ->setCreator('Admin')
    ->setCompany('Perpustakaan')
    ->setDescription('Template Import Buku untuk Aplikasi Perpustakan');

    $excel->sheet('Data Buku', function($sheet){
    $row = 1;
    $sheet->row($row, [
      'judul',
      'penulis',
      'jumlah'
    ]);
  });
  })->export('xls');
}
public function importExcel(Request $request)
{
  $this->validate($request, [ 'excel' => 'required' ]); //|mimes:xlsx something's wrong even has uploaded xlsx or xls extension its still  failed
  $excel = $request->file('excel');
  $excels = Excel::selectSheetsByIndex(0)->load($excel, function($reader){
    //option jika ada
  })->get();

  $rowRules = [
    'judul' => 'required',
    'penulis' => 'required',
    'jumlah' => 'required'
  ];

  $books_id = [];

  foreach ($excels as $row) {
    $validator = Validator::make($row->toArray(), $rowRules);
    if($validator->fails()) continue;
    $author = Author::where('name', $row['penulis'])->first();
    if (!$author) {
      $author = Author::create(['name' => $row['penulis']]);
    }
    $book = Book::create([
      'title' => $row['judul'],
      'author_id' => $author->id,
      'amount' => $row['jumlah']
    ]);
    array_push($books_id, $book->id);
  }

  $books = Book::whereIn('id', $books_id)->get();
  if ($books->count() == 0) {
    Session::flash("flash_notification",[
      "level" => "danger",
      "message" => "Tidak ada Buku yang berhasil di import."
    ]);
    return redirect()->back();
  }
  Session::flash("flash_notification",[
    "level" => "success",
    "message" => "Berhasil mengimport ".$books->count()." Buku."
  ]);
  return view('books.import-review')->with(compact('books'));
}
}
