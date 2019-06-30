<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController as DefaultLoginController;

class LoginAppController extends DefaultLoginController
{
    protected $redirectTo = 'dashboard';

    public function __construct()
    {
        $this->middleware('guest:login_app')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login.login_app');
    }

    public function username()
    {
        return 'username';
    }

    protected function guard()
    {
        return Auth::guard('login_app');
    }
    public function logoutApp(){
        Auth::logout();
        session()->invalidate();
        return redirect(url('login'));
    }
}
