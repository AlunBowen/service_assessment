<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Assessment;
use App\Models\Question;
use App\Models\Service;
use App\Models\Section;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store( $assessment,  $service,  $section,  $question, $answer)
    {

        
        
        if ((auth()->user()->hasPermissionTo('complete assessments'))){

        
        $a = new Answer();
        $a->answer = $answer;
        $a->question()->associate(\App\Models\Question::find($question));
        $a->assessment()->associate(\App\Models\Assessment::find($assessment));
        $a->service()->associate(\App\Models\Service::find($service));
        $a->section()->associate(\App\Models\AssessmentSection::find($section));
        $a->user()->associate(\App\Models\User::find(auth()->user()->id));
        $a->save();

            return response()->json($answer);
        } else {
            return redirect()->route('home');
        }
    }
    
            
          
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getAnswersForAssessment($id, $service_id, $section)
    {
        $subQuery = Answer::select('question_id', DB::raw('MAX(id) as max_id'))
            ->where('assessment_id', $id)
            ->where('service_id', $service_id)
            ->where('section_id', $section)
            ->groupBy('question_id');

        $query = Answer::joinSub($subQuery, 'latest_answers', function ($join) {
            $join->on('answers.id', '=', 'latest_answers.max_id');
        })->get();

        //get the questions for the answer and add to response 
        foreach ($query as $answer) {
            $answer->question;
        }

        return response()->json($query);
    }
}
