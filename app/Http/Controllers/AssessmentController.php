<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assessment;
class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            return view('assessments.index', [
                'assessments' => Assessment::all(),
            ]);

        } else {
            return redirect()->route('home');
        }
    }

  //a function that returns all the assessments in the database and returns as JSON
    // public function getAssessments()
    // {
    //     //if use it authenticated
    //     if (auth()->user()) {
    //         $assessments = Assessment::all();
    //         return response()->json($assessments);
    //     } else {
    //         return redirect()->route('home');
    //     }
        
    // }
 

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->hasPermissionTo('manage assessments')) {
            $assessment = new Assessment();
            $assessment->name_en = $request->name_en;
            $assessment->name_cym = $request->name_cym;
            $assessment->description_en = $request->description_en;
            $assessment->description_cym = $request->description_cym;
            $assessment->service_id = $request->service_id;
            $assessment->save();

            return redirect()->route('assessments.index');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Assessment $assessment)
    {
        if (auth()->user()->hasPermissionTo('manage organisations') || auth()->user()->organisation==$assessment->service->organisation) {
            return view('assessments.show', [
                'assessment' => $assessment,
            ]);

        } else {
            abort(403);
        }
    }

    
}
