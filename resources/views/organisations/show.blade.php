@extends('layouts.app')

@section('head', 'Organisations')

@section('content')


@foreach($organisations as $organisation)
    <p>{{ $organisation->name }}</p>
    <p>{{ $organisation->description }}</p>
@endforeach

@endsection