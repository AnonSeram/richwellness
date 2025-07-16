<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    /**
     * Switch the application language
     *
     * @param Request $request
     * @param string $locale
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLanguage(Request $request, $locale)
    {
        // Daftar bahasa yang didukung
        $supportedLocales = ['en', 'id'];
        
        // Validasi bahasa yang diminta
        if (in_array($locale, $supportedLocales)) {
            // Set locale untuk request saat ini
            App::setLocale($locale);
            
            // Simpan pilihan bahasa di session
            Session::put('locale', $locale);
            
            // Redirect kembali ke halaman sebelumnya atau ke home
            return Redirect::back()->with('success', __('messages.language_changed'));
        }
        
        // Jika bahasa tidak didukung, redirect dengan error
        return Redirect::back()->with('error', __('messages.language_not_supported'));
    }
    
    /**
     * Get current locale
     *
     * @return string
     */
    public function getCurrentLocale()
    {
        return App::getLocale();
    }
    
    /**
     * Get available locales
     *
     * @return array
     */
    public function getAvailableLocales()
    {
        return [
            'en' => [
                'code' => 'en',
                'name' => 'English',
                'flag' => '🇺🇸'
            ],
            'id' => [
                'code' => 'id', 
                'name' => 'Bahasa Indonesia',
                'flag' => '🇮🇩'
            ]
        ];
    }
}

