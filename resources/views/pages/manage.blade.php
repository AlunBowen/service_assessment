@extends('layouts.app')

@section('head', 'Management dashboard')
    
@section('content')


<h1>Management dashboard</h1>
<p>CDPS management dashboard for the service assessment tool.</p>
<hr>
<h2>Manage assessment</h2>
<p>Create and manage assessments</p>
<a href="/" class="btn btn-primary">Manage Assessments</a>
<hr>
<h2>Manage organisations and services</h2>
<p>Create and manage organisations and services</p>
<a href="{{ route('organisations.index') }}" class="btn btn-primary">Manage Organisations</a>
<hr>
<h2>Manage users</h2>
<p>Create and manage users</p>
<a href="/" class="btn btn-primary">Manage Users</a>

@endsection
