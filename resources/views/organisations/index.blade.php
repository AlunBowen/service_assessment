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


<a href="{{ route('organisations.create') }}" class="btn btn-primary">Create Organisation</a>
<div id="app">
<OrganisationsList :organisations="{{ json_encode($organisations) }}" lang="{{ $lang }}" />
</div>
@endsection