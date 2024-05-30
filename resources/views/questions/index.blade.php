@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Assessment dashboard - Section: </h1>
    <h4>{{ $section->name }}</h4>
@php
    $lang = Cookie::get('lang'); 
   

@endphp







    <div id="app">
    <assessmentsectionquestions :section="{{$section}}" ></assessmentsectionquestions>
    
</div>


@endsection