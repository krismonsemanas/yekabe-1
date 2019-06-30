<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->level == 'ADMIN') {
                return redirect('/manage/dashboard');
            } else if(auth()->user()->level == 'GURU'){
                return redirect()->route('dashboard.guru');
            }
            if(auth()->user()->level == 'GURU' && auth()->user()->status == 'ACTIVE') {
                return redirect('/guru');
            }
            if(auth()->user()->level == 'GURU' && auth()->user()->status != 'ACTIVE'){
                Auth::logout();
                Session::flush();
                return redirect(url('login'))->withInput()->with('not_active','Akun anda belum aktif, Hubungi admin untuk aktivasi');
            }
        }
        return $next($request);
    }
}
