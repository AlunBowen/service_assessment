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
        if (auth()->user()->hasPermissionTo('manage organisations')) {
            return view('organisations.index', [
                'organisations' => Organisation::all(),
            ]);

        } else {
           return redirect()->route('home');
        }
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        if (auth()->user()->hasPermissionTo('manage organisations')) {
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
        
        if (auth()->user()->hasPermissionTo('manage organisations')) {
            
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
        if (auth()->user()->hasPermissionTo('manage organisations') || auth()->user()->organisation==$organisation) {
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
        if (auth()->user()->hasPermissionTo('manage organisations')|| auth()->user()->hasPermissionTo('manage own organisation')) {
            return view('organisations.edit', [
                'organisation' => $organisation,
            ]);

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisation $organisation)
    {
        if (auth()->user()->hasPermissionTo('manage organisations')|| auth()->user()->hasPermissionTo('manage own organisation')) {
            $validateData = $request->validate([
                'name' => 'required|max:100',
                'description' => 'required|max:300',
            ]);
            $organisation->name = $validateData['name'];
            $organisation->description = $validateData['description'];
            $organisation->save();

            return redirect()->route('organisations.show', $organisation);
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisation $organisation)
    {
        if (auth()->user()->hasPermissionTo('delete organisations')) {
            $organisation->delete();
            return redirect()->route('organisations.index');
        } else {
            return redirect()->route('home');
        }
    }

    
}
