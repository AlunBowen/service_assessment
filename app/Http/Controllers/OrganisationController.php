<?php

namespace App\Http\Controllers;


use App\Models\Organisation;
use App\Models\User;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;
use function Symfony\Component\String\b;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('viewAny', Organisation::class) ) {
            return view('organisations.index', [
                'organisations' => Organisation::all(),
            ]);

        } else {
           return redirect()->route('home');
        }
    }

    public function getOrganisations()
    {
        $organisations = Organisation::all();
        return response()->json($organisations);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if (auth()->user()->can('create', Organisation::class) ) {
            return view('organisations.create');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        error_log('in store');
        if (auth()->user()->can('create', Organisation::class) ) {
            
            $validateData = $request->validate([
                'name' => 'required|unique:organisations|max:100',
                'description' => 'required|max:300',

            ]);
            $organisation = Organisation::create([
                'name' => $validateData['name'],
                'description' => $validateData['description'],
            ]);

            return redirect()->route('organisations.show', $organisation);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Organisation $organisation)
    {
        if (auth()->user()->can('view', $organisation) ) {
            return view('organisations.show', [
                'organisation' => $organisation,
            ]);

        } else {
            abort(403);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisation $organisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisation $organisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        //
    }

    
}
