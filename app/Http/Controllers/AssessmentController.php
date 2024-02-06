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
    public function getAssessments()
    {

        error_log('in getAssessments');
        $assessments = Assessment::all();
        return response()->json($assessments);
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
}
