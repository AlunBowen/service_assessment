@extends('layouts.app')

@section('head', 'Organisations')

@section('content')


<!-- @foreach($organisations as $organisation)
    <p>{{ $organisation->name }}</p>
    <p>{{ $organisation->description }}</p>
@endforeach -->

@php
    $lang = Cookie::get('lang'); 
@endphp
<div id="app">
<OrganisationsList :organisations="{{ json_encode($organisations) }}" lang="{{ $lang }}" />
</div>
@endsection