@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    
@php
        $user = Auth::user();
        $organisation = App\Models\Organisation::find($user->organisation_id);
        //get all the services for the organisation
        $services = App\Models\Service::where('organisation_id', $organisation->id)->get();
    @endphp
    
   
       
    <h1>Assessment Dashboard<h1>

    <h2> {{ $user->organisation->name }}</h2>

@php
        $lang = Cookie::get('lang');
    @endphp 
   
    <div id="app">
  
    <ServicesList lang="{{$lang}}"/> 
    </div>
@endsection

