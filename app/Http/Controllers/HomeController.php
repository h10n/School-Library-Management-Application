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
        return view('home');
    }
}
