@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Service dashboard: {{ $section->name }}</h1>
@php
    $lang = Cookie::get('lang'); 
   

@endphp







    <div id="app">
    <assessmentsectionquestions :section="{{$section}}" ></assessmentsectionquestions>
    
</div>


@endsection