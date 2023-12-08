@extends('layouts.app')

@section('head', 'Creae User')  

@section('content')
    
{{ session('success') }}
<x-createUser />


@endsection

