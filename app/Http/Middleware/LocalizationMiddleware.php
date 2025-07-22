<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationMiddleware
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
        $supportedLocales = ['en', 'id'];
        $locale = 'id'; // Default to Indonesian
        
        // Check session first
        if (Session::has('locale') && in_array(Session::get('locale'), $supportedLocales)) {
            $locale = Session::get('locale');
        }
        // Check cookie
        elseif ($request->hasCookie('locale') && in_array($request->cookie('locale'), $supportedLocales)) {
            $locale = $request->cookie('locale');
            Session::put('locale', $locale);
        }
        // Check browser language
        elseif ($request->hasHeader('Accept-Language')) {
            $browserLang = substr($request->header('Accept-Language'), 0, 2);
            if (in_array($browserLang, $supportedLocales)) {
                $locale = $browserLang;
                Session::put('locale', $locale);
            }
        }
        
        App::setLocale($locale);
        
        return $next($request);
    }
}

