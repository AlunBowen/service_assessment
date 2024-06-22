<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Section;
use App\Models\Service;
use App\Models\AssessmentSection;
use Illuminate\Http\Request;

use function Laravel\Prompts\error;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->hasPermissionTo('manage organisations')) {
            return view('pages.home');

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
            return view('pages.home');

        } else {
            return redirect()->route('pages.home');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        error_log('store service');
        if  (auth()->user()->hasPermissionTo('manage organisations')) {
            
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->organisation_id = $request->organisation_id;
            $service->save();
            return redirect()->back()->with('Service success', 'Service created successfully');

        } else {
            return redirect()->route('pages.home');
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
            return redirect()->route('pages.home');
        }
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
