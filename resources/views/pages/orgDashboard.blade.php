@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    
@php
        $user = Auth::user();
        $organisation = App\Models\Organisation::find($user->organisation_id);
        //get all the services for the organisation
        $services = App\Models\Service::where('organisation_id', $organisation->id)->get();
        $localization = json_encode(__('messages'));
    @endphp
    
   
       
    <h1>Assessment Dashboard: {{ $user->organisation->name }}<h1>

    <h2> </h2>
    
@php
        $lang = Cookie::get('lang');
       
    @endphp 
    <div id="app">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6 p-4 pb-4" >
            
        <h3>All services</h3>
        <chartcomponent  ></chartcomponent></div>
       <div class="col-md-6 p-4 pb-4" >
        <h3></h3>
        <h5> This is the overall results for all services</h5>
        <overallresults :lang="'{{$lang}}'" :organisation="{{$user->organisation_id}}" :assessment="1"></overallresults>
        

            </div>
            
        </div>
        <statscomponent :lang="'{{$lang}}'" :localization="'{{$localization}}'" :organisation="{{$user->organisation_id}}" :assessment="1"></statscomponent>

    </div>
        
   
      

       
 
    </div>
   
@endsection
