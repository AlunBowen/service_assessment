<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SetLangController extends Controller
{
    public function setLang()
    {
        // $lang = $request->lang;
        // $cookie = cookie('lang', $lang, 60*24*365);
        // return redirect()->back()->cookie($cookie);

        $cookieValue = 'Welsh';

        return response('Cookie set')->cookie('language', $cookieValue, 3600);
}
    
}
