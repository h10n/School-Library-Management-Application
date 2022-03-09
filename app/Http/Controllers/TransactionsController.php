<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BorrowLog;
use App\Member;
use App\Setting;
use App\Book;
use App\Exceptions\BookException;
use App\Http\Requests\StoreTransactionsRequest;
use App\Traits\FlashNotificationTrait;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Session;

class TransactionsController extends Controller
{
  use FlashNotificationTrait;

  public function index(Request $request, Builder $htmlBuilder)
  {
    if ($request->ajax()) {
      //->latest('updated_at') gk fungsi > fixed addIndexColumn
      $stats = BorrowLog::with(['book', 'user', 'member'])->latest();
      if ($request->get('status') == 'returned') $stats = $stats->returned();
      if ($request->get('status') == 'not-returned') $stats = $stats->borrowed();
      $stats = $stats->get();
      return Datatables::of($stats)
        ->addColumn('action', function ($stat) {
          return view('datatable._transaction-action', [
            'model' => $stat,
            'form_url' => route('transactions.destroy', $stat->id),
            'edit_url' => route('transactions.edit', $stat->id),
            'detail_url' => route('transactions.show', $stat->id),
            'update_url' => route('transactions.update', $stat->id),
            'title' => 'Transactions'            
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
      ->addColumn(['data' => 'member.no_induk', 'name' => 'member.no_induk', 'title' => 'Registration Number'])
      ->addColumn(['data' => 'member.name', 'name' => 'member.name', 'title' => 'Borrower'])
      ->addColumn(['data' => 'book.title', 'name' => 'book.title', 'title' => 'Title'])
      ->addColumn(['data' => 'tgl_peminjaman', 'name' => 'tgl_peminjaman', 'title' => 'Borrowing Date'])
      ->addColumn(['data' => 'tgl_max', 'name' => 'tgl_max', 'title' => 'Max Borrowing Date'])
      ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
      ->addColumn(['data' => 'total_denda', 'name' => 'total_denda', 'title' => 'Fine', 'searchable' => false, 'orderable' => true])
      ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false]);
    return view('transactions.index')->with(compact('html'));
  }

  public function create()
  {
    return view('transactions.create');
  }

  public function store(StoreTransactionsRequest $request)
  {
    try {
      $book = Book::FindOrFail($request->get('book_id'));
      $member = Member::find($request->get('member_id'));
      $setting = Setting::find('1');

      //buku sedang di pinjam
      if (BorrowLog::where('book_id', $book->id)->where('member_id', $request->get('member_id'))->where('is_returned', 0)->count() > 0) {
        throw new BookException("Buku $book->title masih dipinjam oleh $member->name");
      }
      //stok buku ada
      if ($book->stock < 1) {
        throw new BookException("Buku $book->title sedang tidak tersedia");
      }
      //sesuai pengaturan max peminjaman
      if (BorrowLog::where('member_id', $request->get('member_id'))->where('is_returned', 0)->count() >= $setting->max_peminjaman) {
        throw new BookException("Hanya Boleh meminjam $setting->max_peminjaman Buku, Silahkan Kembalikan Buku yang Lama Terlebih dahulu");
      }

      BorrowLog::create([
        'member_id' => $request->get('member_id'),
        'user_id' =>  Auth::user()->id,
        'book_id' => $book->id,
      ]);

      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "berhasil meminjam buku $book->title"
      ]);
    } catch (BookException $e) {
      Session::flash("flash_notification", [
        "level" => "danger",
        "message" => $e->getMessage()
      ]);
      return $this->redirectCreatePage();
    } catch (ModelNotFoundException $e) {
      Session::flash("flash_notification", [
        "level" => "danger",
        "message" => "Buku tidak Ditemukan"
      ]);
      return $this->redirectCreatePage();
    }

    return redirect()->route('transactions.index');
  }

  protected function redirectCreatePage()
  {
    return redirect()->route('transactions.create');
  }

  public function show($id)
  {
    $transaction = BorrowLog::with(['Book', 'Member', 'User'])->where('id', $id)->first();
    return view('transactions.show', compact('transaction'));
  }

  public function edit($id)
  {
    $transaction = BorrowLog::findOrFail($id);
    return view('transactions.edit')->with(compact('transaction'));
  }

  public function update($id)
  {
    $transaction = BorrowLog::findOrFail($id);
    if ($transaction) {
      $transaction->is_returned = true;
      $transaction->user_returned_id =  Auth::user()->id;
      $transaction->save();

      Session::flash("flash_notification", [
        "level" => "success",
        "message" => "Berhasil Mengembalikan " . $transaction->book->title
      ]);
    }
    return redirect()->route('transactions.index');
  }
  public function destroy($id)
  {
    $item = BorrowLog::findOrFail($id);
    if (!$item->delete()) return redirect()->back();
    $this->sendFlashNotification('menghapus', 'peminjaman ' . $item->book->title . ' atas nama ' . $item->member->name . ' (' . $item->member->no_induk . ')');
    return redirect()->route('transactions.index');
  }
}
