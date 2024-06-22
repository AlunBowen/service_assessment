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

    public function calculateWorsePerformingSection($id, $service){

        if ((auth()->user()->hasPermissionTo('complete assessments'))){
            
            $q = AssessmentSection::where('assessment_id', $id)->get();

            // $a[] = [];
            // $c = count($q);
            $answers = [];
            $yes [] = [];
            $response = [];
            
            $questions['mustQuestions'] = Question::where('level', 1)->get();
            $questions['shouldQuestions'] = Question::where('level', 2)->get();
            $questions['couldQuestions'] = Question::where('level', 3)->get();


            for ($i = 0; $i < count($q); $i++) {
                $controller = new AnswerController();
                
                // Get the answers and decode the JSON response
                $answer = json_decode($controller->getAnswersForAssessment($id, $service, $q[$i]->id)->getContent(), true);

                // Add the answer to the $answers array
                array_push($answers, $answer);
                
            }

            for ($i = 0; $i < count($answers); $i++) {
                $yesCount1 = 0;
                $yesCount2 = 0;
                $yesCount3 = 0;
                for ($j = 0; $j < count($answers[$i]); $j++) {
                    if ($answers[$i][$j]['answer'] == 'Yes' && $answers[$i][$j]['question']['level'] == 1) {
                        $yesCount1++;
                    }
                    if ($answers[$i][$j]['answer'] == 'Yes' && $answers[$i][$j]['question']['level'] == 2) {
                        $yesCount2++;
                    }
                    if ($answers[$i][$j]['answer'] == 'Yes' && $answers[$i][$j]['question']['level'] == 3) {
                        $yesCount3++;
                    }
                    
                    $yesCount1Percentage = ($yesCount1 / count($questions['mustQuestions'])) * 100;
                    $yesCount2Percentage = ($yesCount2 / count($questions['shouldQuestions'])) * 100;
                    $yesCount3Percentage = ($yesCount3 / count($questions['couldQuestions'])) * 100;
                }

                if ($yesCount1 == 0){
                    $yesCount1Percentage = 0;
                }
                if ($yesCount2 == 0){
                    $yesCount2Percentage = 0;
                }
                if ($yesCount3 == 0){
                    $yesCount3Percentage = 0;
                }

                $worst = min($yesCount1Percentage, $yesCount2Percentage, $yesCount3Percentage);
                
                $sectionResults = [$q[$i]['name_en'], $yesCount1Percentage, $yesCount2Percentage, $yesCount3Percentage];
                array_push($response, $sectionResults);
               

                  }
                  //find the lowest percentage and return the level and section
                    // $lowest = min($response);
                    // $response = array_search($lowest, $response);
                    // error_log($response);

    }   
    return ($response); ;
    }
   


    public function getAllAnswers($id, $assessment, $date = null)
    {
    if ((auth()->user()->hasPermissionTo('complete assessments'))){

    //get all services for the organisation
    $services = Service::where('organisation_id', $id)->get();
    
    //response array
    $response = [];
    //variables to hold the number of yes answers for each level
    $must = 0;
    $should = 0;
    $could = 0;
    
    //get questions for the assessment based on level
    $questions['mustQuestions'] = Question::where('level', 1)->get();
    $questions['shouldQuestions'] = Question::where('level', 2)->get();
    $questions['couldQuestions'] = Question::where('level', 3)->get();

    //add the questions to the response
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

    if ($numberOfServices == 0) {
        return response()->json(0);
    }
    $completionRate = ($servicesWithAnswers / $numberOfServices) * 100;

    error_log(count($questions));

    return response()->json($completionRate);

}

public function getDateOfLastAnswer($id, $assessment){
    //get all services for the organisation
    $services = Service::where('organisation_id', $id)->get();
    //get the last answer for each service
    $response = [];
    foreach ($services as $service) {
        $subQuery = Answer::select('question_id', DB::raw('MAX(id) as max_id'))
            ->where('service_id', $service->id)
            ->where('assessment_id', $assessment)
            ->groupBy('question_id');
        
        $query = Answer::joinSub($subQuery, 'latest_answers', function ($join) {
            $join->on('answers.id', '=', 'latest_answers.max_id');
        })->get();

        foreach ($query as $answer) {
            $answer->created_at;
        }
        

        $response[] = $query;
        //find the most recent created at date
        $latest = "";
        for ($i = 0; $i < count($response); $i++) {
            for ($j = 0; $j < count($response[$i]); $j++) {
                if ($response[$i][$j]->created_at > $latest) {
                    $latest = $response[$i][$j]->created_at;
                }
            }
        }
    }
    //format the date
    $latest = Carbon::parse($latest)->format('d/m/Y');

    return response()->json($latest);
}


public function getCountOfServices($id){
    //get all services for the organisation
    error_log("in get count of services");
    $services = Service::where('organisation_id', $id)->get();
    //get the count of services
    $countOfServices = count($services);
    error_log($countOfServices);
    return response()->json($countOfServices);
   

}


public function getTimeBasedResults($id, $assessment){

    //An array to hold the results
    $must = [];
    $should = [];
    $could = [];
    //todays month using carbon
    $today = Carbon::now();

    //for each month in the last year counting back from the most recent month
    for ($i = 0; $i < 12; $i++) {   

        //initialise the answer controller
        $answerController = new AnswerController();
        //get the most recent answers for the assessment before date 
        $ansers = $answerController->getAllAnswers($id, $assessment, $today)->getData(true);
        //get the count of services
        $countOfServices = count($ansers['services']);
        //calculate the percentage of yes answers for each level
        $mustPercentage = ($ansers['must'] / $ansers['mustLength'] * 100) / $countOfServices;
        $shouldPercentage = ($ansers['should'] / $ansers['shouldLength'] * 100) / $countOfServices;
        $couldPercentage = ($ansers['could'] / $ansers['couldLength'] * 100) / $countOfServices;
        //add the percentages to the arrays
        array_push($must, $mustPercentage);
        array_push($should, $shouldPercentage);
        array_push($could, $couldPercentage);
        //substract a month from the date
        $today = Carbon::now()->subMonth($i);
    }


    $response['must'] = $must;
    $response['should'] = $should;
    $response['could'] = $could;
    return response()->json($response);
}


}
