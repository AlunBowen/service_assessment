<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/resources', function () {
    return view('resources');
});

Route::put('/set-lang', function (Illuminate\Http\Request $request) {   
    // Get the current language from the session
    $currentLang = session('lang');

    // Toggle between 'en' and 'cym'
    $newLang = ($currentLang == 'en'|| $currentLang == null) ? 'cym' : 'en';

    // Set the new language in the session
    session(['lang' => $newLang]);

    // Set the cookie with the new language
    Cookie::queue(Cookie::make('lang', $newLang, 360, null, null, true, false, false, 'None'));
    
    $lang = 'Welsh';

    $cookie = Cookie::make('lang', $lang, 60, null, null, true, false, false, 'None');
    Cookie::queue($cookie);

    return response('Language set');
})->name('set-lang');



Route::post('/user', [App\Http\Controllers\UserController::class,'store'])->name('user.store');

Route::get('/user', [App\Http\Controllers\UserController::class,'index'])->name('user.index');

Route::get('/user/create', [App\Http\Controllers\UserController::class,'create'])->name('user.create'); 

