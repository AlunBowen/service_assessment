@extends('layouts.app')

@section('head', 'Resources')
    
@section('content')




    @php
        $assessments = App\Models\Assessment::all();
        $lang = Cookie::get('lang');
        //get the auth user
        $user = Auth::user();

    @endphp
   
    <div id="app">
    

        <ResourcesContainer lang={{$lang}} />
    
        
   
   
    </div>
@endsection

