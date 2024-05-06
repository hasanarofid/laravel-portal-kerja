<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(session('role_id') == 1){
            return $next($request);
        }else{
            return redirect()->route('loginAdmin')->with('error', 'Username dan Password Tidak Terdaftar Sebagai Admin');
        }
        return redirect()->route('loginAdmin');
    }
}
