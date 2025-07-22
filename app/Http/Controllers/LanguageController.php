<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage($locale)
    {
        // Check if the locale is supported
        $supportedLocales = ['en', 'id'];
        
        if (in_array($locale, $supportedLocales)) {
            // Set the application locale
            App::setLocale($locale);
            
            // Store the locale in session
            Session::put('locale', $locale);
            
            // Store in cookie for 30 days
            $cookie = cookie('locale', $locale, 60 * 24 * 30);
            
            return redirect()->back()->withCookie($cookie);
        }
        
        // If locale is not supported, redirect back without changes
        return redirect()->back();
    }
}

