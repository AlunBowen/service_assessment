@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Assess Service dashboard: {{ $service->name }}</h1>
@php
    $lang = Cookie::get('lang'); 
   
    $org = $service->id;
@endphp



{{$service->name_en}}
{{$section->name_en}}

<br />
{{$service->description}}
<br />
<br />
<br />
<div id="app">
<takeassessment :section="{{$section}}" :service="{{$service}}" ></takeassessment>
</div>
@endsection