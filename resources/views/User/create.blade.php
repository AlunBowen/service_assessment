@extends('layouts.app')

@section('head', 'Create User')  

@section('content')
    
{{ session('success') }}
<x-createUser />


@endsection

