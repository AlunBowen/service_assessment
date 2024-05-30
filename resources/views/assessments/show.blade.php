@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Assessment dashboard: {{ $assessment->name }}</h1>
@php
    $lang = Cookie::get('lang'); 
   
    $org = $assessment->id;
@endphp



    <div id="app">
    <assessmentsections :assessment="{{$assessment}}" ></assessmentsections>
    
</div>


@endsection