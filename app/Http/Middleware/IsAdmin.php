<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
        return redirect('home')->with('error', "Anda Tidak Dapat Mengakses Halaman Ini");
    }
}