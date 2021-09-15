<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Entrust;
use App\Author;
use App\Book;
use App\User;
use App\Publisher;
use App\Category;
use App\BorrowLog;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function boot()
    {
        // Using Closure based composers...
        View::composer('*', function ($view) {
            $perpus2 = Setting::all();
            $view->with($perpus2);
        });
    }

    public function index()
    {
        if (Entrust::hasRole('admin')) {
            return $this->adminDashboard();
        }
        if (Entrust::hasRole('member')) {
            return $this->memberDashboard();
        }
        if (Entrust::hasRole('visitor')) {
            return $this->visitorDashboard();
        }
        return view('home');
    }
    protected function adminDashboard()
    {
        $buku = Book::get();
        $penulis = Author::get();
        $anggota = User::get();
        $penerbit = Publisher::get();
        $kategori = Category::get();
        $transaksi = BorrowLog::get();
        $petugas = User::get();
        $pinjam = BorrowLog::where('is_returned', '0')->get();
        $rekap = BorrowLog::whereYear('created_at', '=', '2017')->whereMonth('created_at', '=', '6')->get();      
        $authors = [];
        $books = [];

        foreach (Author::all() as $author) {
            array_push($authors, $author->name);
            array_push($books, $author->books->count());
        }
        
        return view('dashboard.admin')->with(compact('authors', 'books', 'buku', 'penulis', 'anggota', 'penerbit', 'kategori', 'transaksi', 'pinjam', 'petugas'));
    }
    protected function memberDashboard()
    {
        $borrowLogs = Auth::user()->borrowLogs()->borrowed()->get();
        return view('dashboard.member', compact('borrowLogs'));
    }
    protected function visitorDashboard()
    {
        return view('dashboard.visitor');
    }
}
