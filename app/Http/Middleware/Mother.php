<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Mother
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/');
        }

        if (Auth::user()->role_id == '4') {
            return $next($request);
        }

        if (Auth::user()->role_id == '1') {
            return redirect()->route('doctor');
        }

        if (Auth::user()->role_id == '2') {
            return redirect()->route('sister');
        }

        if (Auth::user()->role_id == '3') {
            return redirect()->route('midwife');
        }

        if (Auth::user()->role_id == '0') {
            return redirect()->route('admin');
        }
    }
}
