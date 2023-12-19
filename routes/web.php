<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganisationController;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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




Route::middleware('auth')->group(function () {
  
    Route::get('/', function () {
        return view('home');
    })->name('home');

    //Pages
    //Management Dashboard
    Route::get('/manage', function () {

        if(auth()->user()->hasRole('super-admin') ) {
            return view('pages.manage');
        } else {
            return redirect()->route('home');
        }
    });

    
    //Services

    Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');

    //Resources

    Route::get('/resources', function () {
        return view('resources');
    });

    //Organisations

    Route::get('/organisations', [App\Http\Controllers\OrganisationController::class, 'index'])->name('organisations.index');
    Route::get('/organisations/create', [App\Http\Controllers\OrganisationController::class, 'create'])->name('organisations.create');
    Route::post('/organisations', [App\Http\Controllers\OrganisationController::class, 'store'])->name('organisations.store');
    Route::get('/organisations/{organisation}', [App\Http\Controllers\OrganisationController::class, 'show'])->name('organisations.show');

    //Users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    
});

Route::get('/set-lang', [App\Http\Controllers\SetLangController::class, 'setLang'])->name('setLang');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__ . '/auth.php';
