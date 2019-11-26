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
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Session;

class TransactionsController extends Controller
{
    public function index(Request $request, Builder $htmlBuilder)
    {
      if ($request->ajax()) {
       $stats = BorrowLog::with(['book','user','member']);
       if ($request->get('status') == 'returned') $stats->returned();
       if ($request->get('status') == 'not-returned') $stats->borrowed();
       return Datatables::of($stats)
       ->addColumn('returned_at', function($stat){
         if ($stat->is_returned) {
           return "-";
         }
         $setting = Setting::find('1');
          $tgl_pinjam = $stat->created_at;
          $durasi = $setting->durasi;
          $max_return = $tgl_pinjam->addDays($durasi);
          return $tgl_pinjam->format('d/m/Y H:i');
       })
       ->addColumn('status', function($stat){
  if ($stat->is_returned) {
    return "Dikembalikan Pada ".$stat->updated_at->format('d/m/Y H:i'); //$stat->updated_at->format('d/m/Y');
  }
  return "Sedang Dipinjam";
})
       ->addColumn('denda', function($stat){
         $setting = Setting::find('1');
         //jadikan satu fungsi
         if ($stat->is_returned) {
           $start_time =  $stat->created_at;
           $finish_time = $stat->updated_at;
           $result = $start_time->diffInDays($finish_time, false);
           if ($result > $setting->durasi) {
               $telat = $result - $setting->durasi;
           return $denda = $telat * $setting->denda;
         }else {
           return "0";
         }
       }else {
         $start_time =  $stat->created_at;
         $finish_time = Carbon::now();
         $result = $start_time->diffInDays($finish_time, false);
         if ($result > $setting->durasi) {
             $telat = $result - $setting->durasi;
         return $denda = $telat * $setting->denda;
       }else {
         return "0";
       }
       }
         return "0";
       })
       ->addColumn('action',function($stat){
         return view('datatable._transaction-action',[
           'model' => $stat,
           'form_url' => route('transactions.destroy',$stat->transaction_code),
           'edit_url' => route('transactions.edit',$stat->transaction_code),
           'detail_url' => route('transactions.show',$stat->transaction_code),
           'title' => 'Transactions',
           'confirm_message' => 'Yakin ingin menghapus  ?'
         ]);
       })->make(true);
     }

     $html = $htmlBuilder
     //ini kalo dihapus bakalan error V
     ->addColumn(['data' => 'transaction_code', 'nis' => 'transaction_code', 'title' => 'Kode ']) // <-- ini kalo dihapus bakalan error
     ->addColumn(['data' => 'member.nis', 'name' => 'member.nis', 'title' => 'NIS'])
     ->addColumn(['data' => 'member.name', 'name' => 'member.name', 'title' => 'Peminjam'])
     ->addColumn(['data' => 'book.title', 'name' => 'book.title', 'title' => 'Judul'])
     ->addColumn(['data' => 'created_at', 'name' => 'created_at', 'title' => 'Tanggal Peminjaman','searchable' => false, 'orderable' => false])
     ->addColumn(['data' => 'returned_at', 'name' => 'returned_at', 'title' => 'Max Tanggal Pengembalian','searchable' => false, 'orderable' => false])
     ->addColumn(['data' => 'status', 'name' => 'tatus', 'title' => 'Status','searchable' => false, 'orderable' => false])
     ->addColumn(['data' => 'denda', 'name' => 'denda', 'title' => 'Denda','searchable' => false, 'orderable' => false])
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
          'transaction_code' => $request->get('transaction_code'),
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
      } catch (ModelNotFoundException $e) {

        Session::flash("flash_notification",[
          "level" => "danger",
          "message" => "Buku tidak Ditemukan"
        ]);
      }
      return redirect()->route('transactions.index');

    }

    public function show($id)
    {
      $transaction = BorrowLog::with(['Book','Member','User'])->where('transaction_code',$id)->first();
      //jadikan satu fungsi
      $setting = Setting::find('1');

      $tgl_pinjam = $transaction->created_at;
      $durasi = $setting->durasi;
      $max_return = $tgl_pinjam->addDays($durasi);
//jadikan satu fungsi

      if ($transaction->is_returned) {
        $start_time =  $transaction->created_at;
        $finish_time = $transaction->updated_at;
        $result = $start_time->diffInDays($finish_time, false);
        if ($result > $setting->durasi) {
        $telat = $result - $setting->durasi;
        $total_denda = $telat * $setting->denda;
      }else {
        $total_denda = "0";
      }
    }else {
      $start_time =  $transaction->created_at;
      $finish_time = Carbon::now();
      $result = $start_time->diffInDays($finish_time, false);
      if ($result > $setting->durasi) {
          $telat = $result - $setting->durasi;
      $total_denda = $telat * $setting->denda;
    }else {
      $total_denda = "0";
    }
    }
      return view('transactions.show', compact('transaction','total_denda','max_return'));
    }

    public function edit($id)
    {
      $transaction = BorrowLog::where('transaction_code', $id)->first();
      return view('transactions.edit')->with(compact('transaction'));
    }

    public function update(Request $request, $id)
    {
      $transaction = BorrowLog::where('transaction_code', $id)->first();
      if ($transaction) {
        $transaction->is_returned = true;
        $transaction->save();

        Session::flash("flash_notification",[
          "level" => "success",
          "message" => "Berhasil Mengembalikan ".$transaction->book->title
        ]);
      }
        return redirect()->route('transactions.index');
    }

}
