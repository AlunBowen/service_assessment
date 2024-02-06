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
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 p-0 pb-4" >
            
        <h3>All services</h3>
        <chartcomponent :data="[]"></chartcomponent></div>
       <div class="col-md-6 p-0 pb-4" >
        <h3>All services</h3>
        <chartcomponent :data="[]"></chartcomponent>


            </div>
            
        </div>
    </div>
    
        <serviceslist :lang="'{{$lang}}'"></serviceslist>
       
    </div>
   
@endsection
