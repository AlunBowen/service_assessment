@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    

    
    <h1>{{(Cookie::get('lang') == 'en' || Cookie::get('lang') == null) ? 'Assessment' : 'Assesun'}}</h1>
       


    @php
        $assessments = App\Models\Assessment::all();
    @endphp
    
        
    @foreach($assessments as $assessment)
    @if (Cookie::get('lang') == 'en' || Cookie::get('lang') == null)
        <p>{{ $assessment->name_en }}</p>
        <p>{{ $assessment->description_en }}</p>
    @else
        <p>{{ $assessment->name_cym }}</p>
        <p>{{ $assessment->description_cym }}</p>
    @endif
    @endforeach
 


  


    <p>Lang: {{ Cookie::get('lang') }}</p>

    @auth
        <p>You are logged in!</p>
    

   
    @php
        $user = Auth::user();
        $organisation = App\Models\Organisation::find($user->organisation_id);
        //get all the services for the organisation
        $services = App\Models\Service::where('organisation_id', $organisation->id)->get();
    @endphp
    @foreach($services as $service)
        <p>{{ $service->name }}</p>
        <p>{{ $service->description }}</p>
    @endforeach

    @endauth

@endsection

