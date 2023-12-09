<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetLangController extends Controller
{
    public function setLang()
    {
         // Get the current language from the session
    $currentLang = session('lang');

    // Toggle between 'en' and 'cym'
    $newLang = ($currentLang == 'en'|| $currentLang == null) ? 'cym' : 'en';

    // Set the new language in the session
    session(['lang' => $newLang]);

    // Set the cookie with the new language
    Cookie::queue(Cookie::make('lang', $newLang, 360, null, null, false, false, false, 'Lax'));
    
  

    

    return back();
}
    
}
