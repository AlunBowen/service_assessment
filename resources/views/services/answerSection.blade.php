@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h5>Service: {{ $service->name }}</h5>
@php
    $lang = Cookie::get('lang'); 
   
    $org = $service->id;
@endphp


<h5>

Assessment sction: {{$section->name_en}}
</h5>
<br />


<div id="app">
<takeassessment :section="{{$section}}" :service="{{$service}}" :lang="'{{$lang}}'" ></takeassessment>
</div>
@endsection