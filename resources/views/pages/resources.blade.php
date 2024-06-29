@extends('layouts.app')

@section('head', 'Resources')
    
@section('content')




    @php
        $assessments = App\Models\Assessment::all();
        $lang = Cookie::get('lang');
        //get the auth user
        $user = Auth::user();
        $localization = json_encode(__('messages'));
    @endphp
   
    <div id="app">
    

        <ResourcesContainer :lang="'{{$lang}}'" :localization="'{{$localization}}'"></ResourcesContainer>
    
        
   
   
    </div>
@endsection

