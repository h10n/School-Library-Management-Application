<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\BorrowLog;
use App\Member;
use App\User;
use App\Setting;
use App\Book;
use Carbon\Carbon;
use App\Exceptions\BookException;
use App\Http\Requests\StoreTransactionsRequest;
use App\Http\Requests\UpdateTransactionsRequest;
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
       $stats = BorrowLog::with(['book','user','member'])->latest();
       //->latest('updated_at') gk fungsi > fixed addIndexColumn
       if ($request->get('status') == 'returned') $stats = $stats->returned();
       if ($request->get('status') == 'not-returned') $stats = $stats->borrowed();
       $stats = $stats->get();
       //  dd($stats);
       return Datatables::of($stats)       
       ->addColumn('action',function($stat){
         return view('datatable._transaction-action',[
           'model' => $stat,
           'form_url' => route('transactions.destroy',$stat->id),
           'edit_url' => route('transactions.edit',$stat->id),
           'detail_url' => route('transactions.show',$stat->id),
           'update_url' => route('transactions.update',$stat->id),
           'title' => 'Transactions',
           'confirm_message' => 'Yakin ingin menghapus  ?'
         ]);
       })
       ->addIndexColumn()
       ->make(true);
     }

     $html = $htmlBuilder
     //ini kalo dihapus bakalan error V
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
    //  ->addColumn(['data' => 'transaction_code', 'no_induk' => 'transaction_code', 'title' => 'Kode ']) // <-- ini kalo dihapus bakalan error
     ->addColumn(['data' => 'member.no_induk', 'name' => 'member.no_induk', 'title' => 'NIS/NIP'])
     ->addColumn(['data' => 'member.name', 'name' => 'member.name', 'title' => 'Peminjam'])
     ->addColumn(['data' => 'book.title', 'name' => 'book.title', 'title' => 'Judul'])
     ->addColumn(['data' => 'tgl_peminjaman', 'name' => 'tgl_peminjaman', 'title' => 'Tanggal Peminjaman','searchable' => false, 'orderable' => true])
     ->addColumn(['data' => 'tgl_max', 'name' => 'tgl_max', 'title' => 'Max Tanggal Pengembalian'])
     ->addColumn(['data' => 'status', 'name' => 'status', 'title' => 'Status'])
     ->addColumn(['data' => 'total_denda', 'name' => 'total_denda', 'title' => 'Denda','searchable' => false, 'orderable' => true])
     ->addColumn(['data' => 'action', 'name' => 'action', 'title' => '', 'orderable' => false, 'searchable' => false ]);
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

        //apakah buku sedang di pinjam
        if (BorrowLog::where('book_id', $book->id)->where('member_id', $request->get('member_id'))->where('is_returned', 0)->count() > 0) {
          throw new BookException("Buku $book->title masih dipinjam oleh $member->name");
        }
        // apakah stok buku ada
        if ($book->stock < 1) {
          throw new BookException("Buku $book->title sedang tidak tersedia");
        }
        if (BorrowLog::where('member_id', $request->get('member_id'))->where('is_returned', 0)->count() >= $setting->max_peminjaman) {
          throw new BookException("Hanya Boleh meminjam $setting->max_peminjaman Buku, Silahkan Kembalikan Buku yang Lama Terlebih dahulu");
        }

        $borrowLog = BorrowLog::create([
          // 'transaction_code' => $request->get('transaction_code'),
          'member_id' => $request->get('member_id'),
          'user_id' =>  Auth::user()->id,
          'book_id' => $book->id,
        ]);

        Session::flash("flash_notification",[
          "level" => "success",
          "message" => "berhasil meminjam buku $book->title"
        ]);

      } catch (BookException $e) {
        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => $e->getMessage()
        ]);
        return $this->redirectCreatePage();
      } catch (ModelNotFoundException $e) {
        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => "Buku tidak Ditemukan"
        ]);
        return $this->redirectCreatePage();
      }

      return redirect()->route('transactions.index');
    }

    protected function redirectCreatePage(){
        return redirect()->route('transactions.create');
    }

    public function show($id)
    {
      $transaction = BorrowLog::with(['Book','Member','User'])->where('id',$id)->first();          
      return view('transactions.show', compact('transaction'));
    }

    public function edit($id)
    {
      $transaction = BorrowLog::findOrFail($id);
      return view('transactions.edit')->with(compact('transaction'));
    }

    public function update(Request $request, $id)
    {
      $transaction = BorrowLog::findOrFail($id);
      if ($transaction) {
        $transaction->is_returned = true;
        $transaction->user_returned_id =  Auth::user()->id;
        $transaction->save();

        Session::flash("flash_notification",[
          "level" => "success",
          "message" => "Berhasil Mengembalikan ".$transaction->book->title
        ]);
      }
        return redirect()->route('transactions.index');
    }
    public function destroy($id)
    {
        $item = BorrowLog::findOrFail($id);
        // dd($item->book);
        if(!$item->delete()) return redirect()->back();        
        $this->sendFlashNotification('menghapus', 'peminjaman '.$item->book->title.' atas nama '.$item->member->name.' ('.$item->member->no_induk.')');
        return redirect()->route('transactions.index');
    }
}
