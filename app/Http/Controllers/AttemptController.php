<?php

namespace App\Http\Controllers;
use App\Models\Attempt;
use Illuminate\Http\Request;

class AttemptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('viewAny', Attempt::class) ) {
            return view('attempt.index', [
                'attempt' => Attempt::all(),
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
        if (auth()->user()->can('create', Attempt::class) ) {
            return view('attempt.create');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('create', Attempt::class) ) {
            $validated = $request->validated();
            $attempt = Attempt::create($validated);
            return redirect()->route('attempt.index')->with('success', 'Attempt created successfully.');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Attempt $attempt)
    {
        if (auth()->user()->can('view', $attempt) ) {
            return view('attempt.show', [
                'attempt' => $attempt,
            ]);

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
