<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\BorrowLog;
use App\Category;
use App\Publisher;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Visitor;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $buku = Book::get();
        $penulis = Author::get();
        $anggota = User::get();
        $penerbit = Publisher::get();
        $kategori = Category::get();
        $transaksi = BorrowLog::get();
        $pinjam = BorrowLog::where('is_returned', '0')->get();                
        $todaysvisit = Visitor::whereDay('created_at', '=', Carbon::now()->format('d'))->count();
        
        return view('dashboard.index')->with(compact('todaysvisit', 'buku', 'penulis', 'anggota', 'penerbit', 'kategori', 'transaksi', 'pinjam'));
    }
}
