<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
use App\Models\AssessmentSection;

use function Laravel\Prompts\error;

class AssessmentSectionController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function store(Request $request)
    {
        error_log($request);
        //validate the request
        $request->validate([
            'name_en' => 'required',
            'name_cym' => 'required',
            'assessment_id' => 'required',
            'description_en'=>'required',
            'description_cym'=>'required'
        ]);

        //create a new assessment section
        $assessmentSection = new AssessmentSection();
        $assessmentSection->name_en = $request->name_en;
        $assessmentSection->name_cym = $request->name_cym;
        $assessmentSection->description_en = $request->description_en;
        $assessmentSection->description_cym = $request->description_cym;
        $assessmentSection->assessment()->associate(Assessment::find($request->assessment_id));
        
        $assessmentSection->save();

        return response()->json($assessmentSection);

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $assessmentSection = AssessmentSection::find($id);
        $assessmentSection->delete();
        return response()->json($assessmentSection);
    }

    /**
     * Display the specified resource.
     */
    public function getAssessmentSections($id){

        $assessmentSections = AssessmentSection::where('assessment_id', $id)->get();
        return response()->json($assessmentSections);
    }


}
