@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Assessment dashbaord:</h1>
@php
    $lang = Cookie::get('lang'); 
   
  
@endphp


<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Service</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($assessments as $assessment)
        <tr>
            <td>{{ $lang == 'en' ? $assessment->name_en : $assessment->name_cym }}</td>
            <td>{{ $lang == 'en' ? $assessment->description_en : $assessment->description_cym }}</td>
            
            <td>
                <a href="{{ route('assessments.show', $assessment) }}" class="btn btn-primary">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>





@endsection