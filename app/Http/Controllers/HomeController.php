<?php

namespace App\Http\Controllers;

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
