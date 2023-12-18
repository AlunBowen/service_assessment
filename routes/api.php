<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AssessmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




//route that returns all the assessments in the database and returns as JSON

Route::get('/assessments', [App\Http\Controllers\AssessmentController::class,'getAssessments'])->name('assessments.getAssessments');


Route::get('/organisations', [App\Http\Controllers\OrganisationController::class, 'index'])->name('organisations.index');


Route::get('/lang', function (Request $request) { 

    if ($request->cookie('lang') == 'en') {
        $lang = 'en';
       
    } 
    
    if ($request->cookie('lang') == 'cym')
    {
        $lang = 'cym';
    }
    
    error_log($request->cookie('lang'));
    return $lang;
});

Route::get('/organisationusers/{id}', [App\Http\Controllers\UserController::class, 'apiIndex'])->name('organisationusers.apiIndex');