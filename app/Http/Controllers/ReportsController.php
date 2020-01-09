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
        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '') {
                $date_from = Carbon::parse($request->from_date)->startOfDay();
                $date_to = Carbon::parse($request->to_date)->endOfDay();

                do {
                  $days[$date_from->formatLocalized('%A, %d-%m-%Y')] = $date_from->format('Y-m-d');
              } while ($date_from->addDay()->format('Y-m-d') <= $date_to->format('Y-m-d'));
    
              foreach ($days as $key => $hari) {
                  $kelas_x = Visitor::whereDate('created_at', '=', $hari)->where('kelas', 'X')->get()->count();
                  $kelas_xi = Visitor::whereDate('created_at', '=', $hari)->where('kelas', 'XI')->get()->count();
                  $kelas_xii = Visitor::whereDate('created_at', '=', $hari)->where('kelas', 'XII')->get()->count();
                  $guru_staff = Visitor::whereDate('created_at', '=', $hari)->where('jenis_anggota', 'guru/staff')->get()->count();
                  $jumlah = $kelas_x+$kelas_xi+$kelas_xii+$guru_staff;
                  $data[$key] = ['kelas_x' => $kelas_x, 'kelas_xi' => $kelas_xi, 'kelas_xii' => $kelas_xii, 'guru_staff' => $guru_staff, 'jumlah' => $jumlah];
              }
            } else {
                $data = [];
            }
            echo json_encode($data);
        }
    }

    public function lihatTransactionReport(Request $request)
    {
        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '') {
                $date_from = Carbon::parse($request->from_date)->startOfDay();
                $date_to = Carbon::parse($request->to_date)->endOfDay();

                do {
                    $days[$date_from->formatLocalized('%A, %d-%m-%Y')] = $date_from->format('Y-m-d');
                } while ($date_from->addDay()->format('Y-m-d') <= $date_to->format('Y-m-d'));
      
                foreach ($days as $key => $hari) {
                    $peminjaman = BorrowLog::whereDate('created_at', '=', $hari)->where('is_returned', '0')->get()->count();
                    $pengembalian = BorrowLog::whereDate('created_at', '=', $hari)->where('is_returned', '1')->get()->count();
                    $data[$key] = ['peminjaman' => $peminjaman, 'pengembalian' => $pengembalian];
                }
            } else {
                $data =  [];
            }
            echo json_encode($data);
        }
    }

    public function lihatTahunVisitorReport(Request $request)
    {
        if ($request->ajax()) {
            if ($request->what_year != '') {
                $what_year = $request->what_year;

                for ($i=1; $i <= 12; $i++) { 
                  $nama_bulan = Carbon::createFromFormat('m', $i);
                  
                  $jumlah = Visitor::whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $what_year)->get()->count();                  
                  $data[$nama_bulan->formatLocalized('%B')] = ['jumlah' => $jumlah];
                }

            } else {
                $data =  [];
            }
            echo json_encode($data);
        }
    }

    public function lihatTahunTransactionReport(Request $request)
    {
        if ($request->ajax()) {
            if ($request->what_year != '') {
                $what_year = $request->what_year;

                for ($i=1; $i <= 12; $i++) { 
                  $nama_bulan = Carbon::createFromFormat('m', $i);
                  
                  $peminjaman = BorrowLog::whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $what_year)->where('is_returned', '0')->get()->count();
                  $pengembalian = BorrowLog::whereMonth('created_at', '=', $i)->whereYear('created_at', '=', $what_year)->where('is_returned', '1')->get()->count();
                  $data[$nama_bulan->formatLocalized('%B')] = ['peminjaman' => $peminjaman, 'pengembalian' => $pengembalian];
                }                          
            
            } else {
              $data =  [];
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
        if ($request->ajax()) {
            if ($request->from_date != '' && $request->to_date != '') {
                $date_from = Carbon::parse($request->from_date)->startOfDay();
                $date_to = Carbon::parse($request->to_date)->endOfDay();

                $data = Book::whereDate('created_at', '>=', $date_from)
->whereDate('created_at', '<=', $date_to)
->get()
->toArray();
            } else {
                $data =  Book::orderBy('created_at', 'desc')->get();
            }
            echo json_encode($data);
        }
    }


    public function lihatTahunBookReport(Request $request)
    {
        if ($request->ajax()) {
            if ($request->what_year != '') {
                $what_year = $request->what_year;

                $data = Book::whereYear('created_at', '=', $what_year)->get()->toArray();
            } else {
                $data =  Book::orderBy('created_at', 'desc')->get();
            }
            echo json_encode($data);
        }
    }
}
