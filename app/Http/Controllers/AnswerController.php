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
use App\Models\AssessmentSection;
use Carbon\Carbon;

class AnswerController extends Controller
{
   

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
    
            
    

    public function getAnswersForAssessment($id, $service_id, $section)
    {
        if ((auth()->user()->hasPermissionTo('complete assessments'))){
        //Find the ids of the latest answers for each question in the assessment -
        //group the answers for the assessment, service and section being requested
        //by question_id and get the latest answer for each question based on the 
        //highest id
        $subQuery = Answer::select('question_id', DB::raw('MAX(id) as max_id'))
            ->where('assessment_id', $id)
            ->where('service_id', $service_id)
            ->where('section_id', $section)
            ->groupBy('question_id');
        
        //join the subquery with the answers table to get the answers for the questions
        $query = Answer::joinSub($subQuery, 'latest_answers', function ($join) {
            $join->on('answers.id', '=', 'latest_answers.max_id');
        })->get();

        //get the questions for the answer and add to response 
        foreach ($query as $answer) {
            $answer->question;
        }

        return response()->json($query);
    } else {
        return 0;
    }
    }

    public function getAllAnswers($id, $assessment, $date = null)
    {
    if ((auth()->user()->hasPermissionTo('complete assessments'))){

    $services = Service::where('organisation_id', $id)->get();
    
    $response = [];
    $must = 0;
    $should = 0;
    $could = 0;
    
    //set assessment sections for the assessment being requested
    $section = AssessmentSection::where('assessment_id', $assessment)->get();
 
        $questions['mustQuestions'] = Question::where('level', 1)->get();
        $questions['shouldQuestions'] = Question::where('level', 2)->get();
        $questions['couldQuestions'] = Question::where('level', 3)->get();

        $response['questions'][] = $questions;

    //for each service 
    foreach ($services as $service) {
        //get the laters answer for each question for the service
        $subQuery = Answer::select('question_id', DB::raw('MAX(id) as max_id'))
            ->where('service_id', $service->id)
            ->where('assessment_id', $assessment);
            if ($date !== null) {
                $subQuery->where('created_at', '<', $date);
            }
            $subQuery->groupBy('question_id');
        
        $query = Answer::joinSub($subQuery, 'latest_answers', function ($join) {
            $join->on('answers.id', '=', 'latest_answers.max_id');
        })->get();

        foreach ($query as $answer) {
            $answer->question;
            //add the service to the answer
            $answer->service;
        }

        //for each question in the assessment where level is 1 calculate how many answers are yes
        $response['answers'][] = $query;

        foreach ($questions['mustQuestions'] as $question) {
            foreach ($query as $answer) {
                if ($answer->question_id == $question->id) {
                    if ($answer->answer == 'Yes') {
                        $must++;
                    }
                }
            }
        }
    
        foreach ($questions['shouldQuestions'] as $question) {
            foreach ($query as $answer) {
                if ($answer->question_id == $question->id) {
                    if ($answer->answer == 'Yes') {
                        $should++;
                    }
                }
            }
        }
    
        foreach ($questions['couldQuestions'] as $question) {
            foreach ($query as $answer) {
                if ($answer->question_id == $question->id) {
                    if ($answer->answer == 'Yes') {
                        $could++;
                    }
                }
            }
        }
    }
   
    $response['services'] = $services; 
    $response['must'] = $must;
    $response['should'] = $should;
    $response['could'] = $could;
    $response['mustLength'] = count($questions['mustQuestions']);
    $response['shouldLength'] = count($questions['shouldQuestions']);
    $response['couldLength'] = count($questions['couldQuestions']);



    return response()->json($response);
    } else {
        return 0;
    }
}


public function completionRate($id, $assessment){
    error_log($id, $assessment);    //get all services for the organisation
    $services = Service::where('organisation_id', $id)->get();

   

    //get all questions for the assessment sections
    $questions = Question::where('assessment_id', $assessment)->get();

    $numberOfServices = count($services);
    $servicesWithAnswers = 0;

    //for each of the services check to see if there is any answer for any of the questions
    foreach ($services as $service) {
      //get all the answers for the service
        $answers = Answer::where('service_id', $service->id)->get();

        if (count($answers) > 0) {
            $servicesWithAnswers++;
        }
    }

    $completionRate = ($servicesWithAnswers / $numberOfServices) * 100;

    error_log(count($questions));

    return response()->json($completionRate);

}

public function getTimeBasedResults($id, $assessment){

    //An array to hold the results
    $must = [];
    $should = [];
    $could = [];
    //todays month using carbon
    $today = Carbon::now();
    

    for ($i = 0; $i < 12; $i++) {
        
        $answerController = new AnswerController();
        $ansers = $answerController->getAllAnswers($id, $assessment, $today)->getData(true);
        $countOfServices = count($ansers['services']);
        $mustPercentage = ($ansers['must'] / $ansers['mustLength'] * 100) / $countOfServices;
        $shouldPercentage = ($ansers['should'] / $ansers['shouldLength'] * 100) / $countOfServices;
        $couldPercentage = ($ansers['could'] / $ansers['couldLength'] * 100) / $countOfServices;

        array_push($must, $mustPercentage);
        array_push($should, $shouldPercentage);
        array_push($could, $couldPercentage);
        $today = Carbon::now()->subMonth($i);
    }
//    
    

    $response['must'] = $must;
    $response['should'] = $should;
    $response['could'] = $could;
    return response()->json($response);
}


}
