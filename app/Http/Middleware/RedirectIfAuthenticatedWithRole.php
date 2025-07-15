<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticatedWithRole
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->is_admin) {
                return redirect()->route('admin.home');
            } elseif ($user->role === 'resepsionis') {
                return redirect()->route('resepsionis.dataReservasi');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}