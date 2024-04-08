<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Section;
use App\Models\Service;
use App\Models\AssessmentSection;

use function Laravel\Prompts\error;

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
        if (auth()->user()->organisation==$service->organisation)  {
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

    public function getServices()
    {
        
       //get all services for the organisation
        $services = Service::where('organisation_id', auth()->user()->organisation_id)->with('department')->get();
        error_log($services);
        return response()->json($services);
        
        
    }

    public function answerSection(Service $service, AssessmentSection $section)
    {
        if (auth()->user()->organisation==$service->organisation)  {

            
            
            

            return view('services.answerSection', [
                'service' => $service,
                'section' => $section,
            ]);
           

        } else {
            return redirect()->route('home');
        }
    }
}
