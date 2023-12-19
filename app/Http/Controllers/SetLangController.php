<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Exception;


class SetLangController extends Controller
{
    public function setLang( Request $request)
    {
    
        
        try {
            $currentLang = Cookie::get('lang');
        } catch (Exception $e) {
            $currentLang = 'en';
        }
        
    // Toggle between 'en' and 'cym'
    $newLang = ($currentLang == 'en'|| $currentLang == null) ? 'cym' : 'en';

    // Set the new language in the session
    session(['lang' => $newLang]);

    // Set the cookie with the new language
    Cookie::queue(Cookie::make('lang', $newLang, 360, null, null, false, false, false, 'Lax'));
        app()->setLocale('cym');
    $redirectRoute = $request->input('redirect', '/');
        return redirect($redirectRoute);
    }
    
}
