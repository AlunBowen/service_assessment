@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h4>{{ $service->name }}</h4>
@php
    $lang = Cookie::get('lang'); 
   
    $org = $service->id;
@endphp


<h4></h4>

{{$section->name_en}}

<br />

<br />
<br />
<br />
<div id="app">
<takeassessment :section="{{$section}}" :service="{{$service}}" :lang="'{{$lang}}'" ></takeassessment>
</div>
@endsection