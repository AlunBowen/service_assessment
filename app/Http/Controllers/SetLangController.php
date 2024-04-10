<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Exception;
use Illuminate\Support\Facades\Crypt;


class SetLangController extends Controller
{
    public function setLang( Request $request)
    {
        error_log('setLang');
        
        try {
            $currentLang = Cookie::get('lang');
        } catch (Exception $e) {
            $currentLang = 'en';
        }
        
    // Toggle between 'en' and 'cym'
    $newLang = ($currentLang == 'en') ? 'cym' : 'en';

    // Set the new language in the session
    session(['lang' => $newLang]);

    // Set the cookie with the new language
    Cookie::queue(Cookie::make('lang', $newLang, 360, null, null, false, false, false, 'Lax'));
        app()->setLocale($newLang);
    $redirectRoute = $request->input('redirect', '/');
        return redirect($redirectRoute);
    }
    
    
}
