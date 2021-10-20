<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Entrust;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole(['admin', 'staff'])) {
            return redirect()->route('dashboard.index');
        } elseif ($user->hasRole('visitor')) {
            return redirect()->route('visitors.guest-book');
        } elseif ($user->hasRole('member')) {
            return redirect()->route('members.status-history');
        }
    
        return redirect('/');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //this function to login using username not email
    public function username()
    {
        return 'username';
    }
}
