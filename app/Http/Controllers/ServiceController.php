<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('viewAny', Service::class) ) {
            return view('services.index', [
                'services' => Service::all(),
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
        if (auth()->user()->can('create', Service::class) ) {
            return view('services.create');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        if (auth()->user()->can('create', Service::class) ) {
            $validated = $request->validated();
            $service = Service::create($validated);
            return redirect()->route('services.index')->with('success', 'Service created successfully.');

        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        if (auth()->user()->can('view', $service) ) {
            return view('services.show', [
                'service' => $service,
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
    public function update(UpdateServiceRequest $request, Service $service)
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
