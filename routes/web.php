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
        return view('pages.home');
    })->name('home');

    //Pages
    //Management Dashboard
    Route::get('/manage', function () {

        if(auth()->user()->hasRole('super-admin') ) {
            return view('pages.manage');
        } else {
            return redirect()->route('pages.home');
        }
    });

    
    //Services

    Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');
    Route::get('/services/create', [App\Http\Controllers\ServiceController::class, 'create'])->name('services.create');
    Route::post('/services', [App\Http\Controllers\ServiceController::class, 'store'])->name('services.store');
    Route::get('/services/{service}', [App\Http\Controllers\ServiceController::class, 'show'])->name('services.show');
    Route::get('/services/{service}/{section}', [App\Http\Controllers\ServiceController::class, 'answerSection'])->name('services.answerSection');
    //Resources

    Route::get('/resources', function () {
        return view('pages.resources');
    })->name('resources');

    //Organisations

    Route::get('/organisations', [App\Http\Controllers\OrganisationController::class, 'index'])->name('organisations.index');
    Route::get('/organisations/create', [App\Http\Controllers\OrganisationController::class, 'create'])->name('organisations.create');
    Route::post('/organisations', [App\Http\Controllers\OrganisationController::class, 'store'])->name('organisations.store');
    Route::get('/organisations/{organisation}', [App\Http\Controllers\OrganisationController::class, 'show'])->name('organisations.show');
    Route::get('/organisations/{organisation}/edit', [App\Http\Controllers\OrganisationController::class, 'edit'])->name('organisations.edit');
    Route::patch('/organisations/{organisation}', [App\Http\Controllers\OrganisationController::class, 'update'])->name('organisations.update');
    Route::delete('/organisations/{organisation}', [App\Http\Controllers\OrganisationController::class, 'destroy'])->name('organisations.destroy'); 

    //Users
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

    //Attempt
    Route::get('/attempts', [App\Http\Controllers\AttemptController::class, 'index'])->name('attempts.index');
    Route::get('/attempts/create', [App\Http\Controllers\AttemptController::class, 'create'])->name('attempts.create');
    Route::post('/attempts', [App\Http\Controllers\AttemptController::class, 'store'])->name('attempts.store');
    Route::get('/attempts/{attempt}', [App\Http\Controllers\AttemptController::class, 'show'])->name('attempts.show');
    
    //Assessments
    Route::get('/assessments', [App\Http\Controllers\AssessmentController::class, 'index'])->name('assessments.index');
    Route::get('/assessments/create', [App\Http\Controllers\AssessmentController::class, 'create'])->name('assessments.create');
    Route::get('/assessments/{assessment}', [App\Http\Controllers\AssessmentController::class, 'show'])->name('assessments.show');
    Route::get('/assessmentsection/{id}/questions', [App\Http\Controllers\QuestionController::class,'getQuestionsForSection'])->name('getQuestionsForSection');

});

Route::get('/set-lang', [App\Http\Controllers\SetLangController::class, 'setLang'])->name('setLang');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


require __DIR__ . '/auth.php';
