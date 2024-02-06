@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Service dashboard: {{ $service->name }}</h1>
@php
    $lang = Cookie::get('lang'); 
   
    $org = $service->id;
@endphp



{{$service->name_en}}
<br />
{{$service->description}}



@endsection