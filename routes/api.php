<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\AssessmentSectionController;
use App\Http\Controllers\QuestionController;

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

// routes/api.php

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/assessments', [App\Http\Controllers\AssessmentController::class,'getAssessments'])->name('assessments.getAssessments');

    //Assessment section routes
   
    Route::get('/assessmentsection/{id}', [App\Http\Controllers\AssessmentSectionController::class,'getAssessmentSections'])->name('assessmentsections.getAssessmentSections');
    Route::delete('/assessmentsection/{id}', [App\Http\Controllers\AssessmentSectionController::class,'destroy'])->name('assessmentsections.destroy');
    Route::post('/assessmentsection', [App\Http\Controllers\AssessmentSectionController::class,'store'])->name('assessmentsections.store');
    Route::get('/question/{id}', [App\Http\Controllers\QuestionController::class,'getQuestionsForSection'])->name('assessmentsections.getQuestionsForSection');
    Route::get('/services', [App\Http\Controllers\ServiceController::class,'getServices'])->name('services.getServices');
    Route::post('/service', [App\Http\Controllers\ServiceController::class,'store'])->name('services.store');
    Route::post('/question', [App\Http\Controllers\QuestionController::class,'store'])->name('questions.store');
    Route::delete('/question/{id}', [App\Http\Controllers\QuestionController::class,'destroy'])->name('questions.destroy');
    Route::patch('/question/{id}', [App\Http\Controllers\QuestionController::class,'update'])->name('questions.update');
    Route::get('/results/{id}/{assessment}', [App\Http\Controllers\AnswerController::class,'completionRate'])->name('answers.completionRate');
    Route::get('/answers/{id}/{service_id}/{section}', [App\Http\Controllers\AnswerController::class,'getAnswersForAssessment'])->name('answers.getAnswers');
    Route::get('/answers/{id}/{assessment}', [App\Http\Controllers\AnswerController::class,'getAllAnswers'])->name('answers.getAllAnswers');
    Route::get('/answersTime/{id}/{assessment}', [App\Http\Controllers\AnswerController::class,'getTimeBasedResults'])->name('answers.getTimeBasedResults');
    Route::post('/answer/{assessment}/{service}/{section}/{question}/{answer}', [App\Http\Controllers\AnswerController::class,'store'])->name('answers.store');
    Route::get('/answer/results/{id}/{assessment}', [App\Http\Controllers\AnswerController::class,'calculateWorsePerformingSection'])->name('answers.calculateWorsePerformingSection');
    Route::get('/resources', [App\Http\Controllers\ResourceController::class,'getResources'])->name('resources.getResources');
    Route::get('/resources/{section}', [App\Http\Controllers\ResourceController::class,'getCuratedResources'])->name('resources.getCuratedResources');
    Route::get('/results/lastupdate/{id}/{assessment}', [App\Http\Controllers\AnswerController::class,'getDateOfLastAnswer'])->name('answers.getDateOfLastAnswer');
    Route::get('/countofservices/{id}', [App\Http\Controllers\AnswerController::class,'getCountOfServices'])->name('answers.getCountOfServices');
}); 


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