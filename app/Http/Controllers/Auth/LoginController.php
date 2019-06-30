<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    use AuthenticatesUsers {
        logout as doLogout;
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

    public function username() { return 'username'; }
    public function logout(Request $request)
    {
        $this->doLogout($request);

        return redirect()->route('login');
    }
    public function redirectTo()
    {
        $user = Auth::user();
        switch($user->level):
            case 'ADMIN':
                return 'manage/dashboard';
            case 'GURU':
                return route('dashboard.guru');
        endswitch;
    }
}
