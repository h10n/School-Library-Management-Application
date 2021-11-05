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
        // $petugas = User::get();
        $pinjam = BorrowLog::where('is_returned', '0')->get();
        $rekap = BorrowLog::whereYear('created_at', '=', '2017')->whereMonth('created_at', '=', '6')->get();      
        $hariini = Carbon::now()->format('d');   
        $todaysvisit = Visitor::whereDay('created_at', '=', $hariini)->count();
        $authors = [];
        $books = [];

        foreach (Author::all() as $author) {
            array_push($authors, $author->name);
            array_push($books, $author->books->count());
        }
        
        return view('dashboard.index')->with(compact('todaysvisit','authors', 'books', 'buku', 'penulis', 'anggota', 'penerbit', 'kategori', 'transaksi', 'pinjam'));
    }
}
