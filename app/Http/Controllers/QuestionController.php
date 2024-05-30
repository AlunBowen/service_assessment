<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssessmentSection;
use App\Models\Question;
use App\Models\Assessment;
use function Laravel\Prompts\error;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            
            $request->validate([
                'question_en' => 'required',
                'question_cym' => 'required',
                'level' => 'required', 
                'assessment_section_id' => 'required',
                'assessment_id' => 'required',
                
            ]);
            
            //create a new question
            $question = new Question();
            $question->question_en = $request->question_en;
            $question->question_cym = $request->question_cym;
            $question->level = $request->level;
            $question->assessmentSection()->associate(AssessmentSection::find($request->assessment_section_id));
            $question->assessment()->associate(Assessment::find($request->assessment_id));
            $question->save();
            
            return response()->json($question);

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

        error_log('in update');
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            $request->validate([
                'question_en' => 'required',
                'question_cym' => 'required',
                'level' => 'required',
                'assessment_section_id' => 'required',
                'assessment_id' => 'required',
            ]);
            $question = Question::find($id);
            $question->question_en = $request->question_en;
            $question->question_cym = $request->question_cym;
            $question->level = $request->level;
            $question->assessmentSection()->associate(AssessmentSection::find($request->assessment_section_id));
            $question->assessment()->associate(Assessment::find($request->assessment_id));
            $question->save();
            return response()->json($question);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            error_log('in destroy');
            $question = Question::find($id);
            $question->delete();
            return response()->json($question);
        } else {
            return redirect()->route('home');
        }
    }

    public function getQuesionsForSection($id){

        $assessmentSectionQuestions = AssessmentSection::find($id)->questions;
        error_log($assessmentSectionQuestions);
        return response()->json($assessmentSectionQuestions);
    }

    public function getQuestionsForSection($id){
        error_log('in getQuestionsForSection');
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            error_log('in getQuestionsForSection');
            return view('questions.index', [
                'section' => AssessmentSection::find($id),
            ]);

        } else {
            return redirect()->route('home');
        }
    }
}
