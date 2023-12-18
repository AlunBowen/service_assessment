@extends('layouts.app')

@section('head', 'Organisations')

@section('content')


@php
    $lang = Cookie::get('lang'); 
@endphp

@section('content')

@php
    $lang = Cookie::get('lang'); 
@endphp

<form action="{{ route('organisations.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection
@endsection
