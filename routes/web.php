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

Route::put('/set-lang', [App\Http\Controllers\SetLangController::class,'setLang'])->name('setLang');



Route::post('/user', [App\Http\Controllers\UserController::class,'store'])->name('user.store');

Route::get('/user', [App\Http\Controllers\UserController::class,'index'])->name('user.index');

Route::get('/user/create', [App\Http\Controllers\UserController::class,'create'])->name('user.create'); 

