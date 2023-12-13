@extends('layouts.app')

@section('head', 'Resources')
    
@section('content')




    @php
        $assessments = App\Models\Assessment::all();
        $lang = Cookie::get('lang');
        //get the auth user
        $user = Auth::user();

    @endphp
    <p> Hi {{ $user->name }} </p>
    <h1>{{(Cookie::get('lang') == 'en' || Cookie::get('lang') == null) ? 'Resources' : 'Assesun'}}</h1>
    <div id="app">
    

        <ResourcesContainer lang={{$lang}} />
    
        
   
   
    </div>
@endsection

