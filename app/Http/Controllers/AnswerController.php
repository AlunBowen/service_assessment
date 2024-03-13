<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Assessment;
use App\Models\Service;

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
    public function store(Request $request)
    {
        //
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
        // error_log($service_id);

        // $ser = Service::where('id', $service_id)->first();
        // $s = $ser->id;
        // $query = Answer::where('service_id',  $s)->get();
        
        $query = Answer::where('assessment_id', $id)->where('service_id', $service_id)->where('section_id', $section)->get();
        //get the questions for the answer and add to response 
        foreach ($query as $answer) {
            $answer->question;
        }
        return response()->json($query);
    }
}
