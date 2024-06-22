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
    
   
       
    <h5 class="text-secondary">Assessment Dashboard: {{ $user->organisation->name }}<h5>

    <hr />
    
@php
        $lang = Cookie::get('lang');
       
    @endphp 
    <div id="app">
    <div class="container mt-4">
        <div class="row">
            
        <div class="col-md-1" ></div>
       <div class="col-md-5 p-4 pb-4 card m-1" >
        
        <h5> This is the overall results for all services</h5>
        <overallresults :lang="'{{$lang}}'" :organisation="{{$user->organisation_id}}" :assessment="1"></overallresults>
        </div>
        <div class="col-md-5 p-4 pb-4 card m-1" >
        <div class="col-md-1" ></div>
        
        <h5> Your progress over time</h5>
        <timebasedchart :lang="'{{$lang}}'" :organisation="{{$user->organisation_id}}" :assessment="1"></timebasedchart>

        </div>
            
        </div>
        
        <div class="row" >
        <div class="col-md-1"  ></div>
        <div class="col-md-10">
        <div class="col-md-1"  ></div>
        <statscomponent :lang="'{{$lang}}'" :localization="'{{$localization}}'" :organisation="{{$user->organisation_id}}" :assessment="1"></statscomponent>
        </div>
        </div>
    </div>
        
   
      

       
 
    </div>
   
@endsection
