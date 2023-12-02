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
    Cookie::queue(Cookie::make('lang', $request->get('lang'), 360));
    error_log( $request->get('lang'));

    return back();
})->name('set-lang');     

