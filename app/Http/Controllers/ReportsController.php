<?php

namespace App\Http\Controllers;
//use DB;  //uncomment this if u want to use dif method
use App\Visitor;
use App\Book;
use App\BorrowLog;
//use Response;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ReportsController extends Controller
{

//laporan pengunjung
    public function visitorReport()
    {
      return view('reports.visitor');
    }
    public function transactionReport()
    {
      return view('reports.transaction');
    }

    public function lihatVisitorReport(Request $request)
    {
      //return view('reports.visitor');
    //  $data = Visitor::where('id', request()->data)->get();
      //  return Response::json($data);
    //  $start = $request->from_date;
      //$end = $request->to_date;

      //$orders = Auth::user()->orders()->whereBetween('created_at', [$start, $end])->get();

      if($request->ajax())
     {
      if($request->from_date != '' && $request->to_date != '')
      {
        $date_from = Carbon::parse($request->from_date)->startOfDay();
        $date_to = Carbon::parse($request->to_date)->endOfDay();

      $data = Visitor::whereDate('created_at', '>=', $date_from)
    ->whereDate('created_at', '<=', $date_to)
    ->get()
    ->toArray();

      //different method
      // $data = DB::table('visitors')
        // ->whereBetween('created_at', array($request->from_date, $request->to_date))
      //   ->get();
      }
      else
      {
        //different method
       //$data = DB::table('visitors')->orderBy('created_at', 'desc')->get();
        $data =  Visitor::orderBy('created_at', 'desc')->get();
      }
      echo json_encode($data);
     }


    }


    public function lihatTahunVisitorReport(Request $request)
    {


      if($request->ajax())
     {
      if($request->what_year != '')
      {
        $what_year = $request->what_year;

$data = Visitor::whereYear('created_at', '=', $what_year)->get()->toArray();
      }
      else
      {

        $data =  Visitor::orderBy('created_at', 'desc')->get();
      }
      echo json_encode($data);
     }
    }

    public function lihatTahunTransactionReport(Request $request)
    {      
    //   $peminjaman = BorrowLog::select('id', 'created_at')->where('is_returned', '1')->whereRaw('year(`created_at`) = ?', "2019")->get()->groupBy(function($date) {          
    //     return Carbon::parse($date->created_at)->format('m'); // grouping by months
    // });

    // $jumlah = [];
    // $bulan = [];
    
    // foreach ($peminjaman as $key => $value) {
    //     $jumlah[(int)$key] = count($value);
    // }
    
    // for($i = 1; $i <= 12; $i++){
    //     if(!empty($jumlah[$i])){
    //         $bulan[$i] = $jumlah[$i];    
    //     }else{
    //         $bulan[$i] = 0;    
    //     }
    // } 
    //         return $bulan;

    // dd($peminjaman);

      if($request->ajax())
     {
      if($request->what_year != '')
      {
      $what_year = $request->what_year;
      $data = Visitor::whereYear('created_at', '=', $what_year)->get()->toArray();

      $peminjaman = BorrowLog::select('id', 'created_at')->whereRaw('year(`created_at`) = ?', "2019")->get()->groupBy(function($date) {          
          return Carbon::parse($date->created_at)->format('m'); // grouping by months
      });

      // dd($peminjaman);
      }
      else
      {

        $data =  Visitor::orderBy('created_at', 'desc')->get();
      }
      echo json_encode($data);
     }
    }

//laporan Buku
public function bookReport()
{
  return view('reports.book');
}

public function lihatBookReport(Request $request)
{
  if($request->ajax())
 {
  if($request->from_date != '' && $request->to_date != '')
  {
    $date_from = Carbon::parse($request->from_date)->startOfDay();
$date_to = Carbon::parse($request->to_date)->endOfDay();

$data = Book::whereDate('created_at', '>=', $date_from)
->whereDate('created_at', '<=', $date_to)
->get()
->toArray();

  }
  else
  {

    $data =  Book::orderBy('created_at', 'desc')->get();
  }
  echo json_encode($data);
 }


}


public function lihatTahunBookReport(Request $request)
{


  if($request->ajax())
 {
  if($request->what_year != '')
  {
    $what_year = $request->what_year;

$data = Book::whereYear('created_at', '=', $what_year)->get()->toArray();
  }
  else
  {

    $data =  Book::orderBy('created_at', 'desc')->get();
  }
  echo json_encode($data);
 }
}

}
