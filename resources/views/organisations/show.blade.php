@extends('layouts.app')

@section('head', 'Organisations')

@section('content')

<h1>Management dashbaord: {{ $organisation->name }}</h1>
@php
    $lang = Cookie::get('lang'); 
    $users = App\Models\User::where('organisation_id', $organisation->id)->orderBy('name')->get();
    $org = $organisation->id;
@endphp

<!-- <div id="app">
<OrganisationsList :organisations="{{ json_encode($organisation) }}" lang="{{ $lang }}" />
</div> -->

{{$organisation->name}}
<br />
{{$organisation->description}}

@foreach($organisation->services as $service)
    <p>{{ $service->name }}</p>
    <p>{{ $service->description }}</p>
    <a href="{{ route('services.show', $service->id) }}" class="btn btn-primary">View Service</a>
@endforeach

<div class="accordion accordion-flush" id="createUserAccordion">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        <h2>Create a new user</h2>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#createUserAccordion">
      <div class="accordion-body">
      <x-createUser :organisation="$organisation" />
      </div>
    </div>
  </div>



@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
</div>
<hr />


<div class="accordion accordion-flush" id="searchForAUser">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseOne">
      <h2>Search for a user</h2> 
      </button>
    </h2>
    <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#searchForAUser">
      <div class="accordion-body">
     
      

<div id="app">



<UserList :organisation_id="{{(int)$org}}" />
</div>
</div>
    </div>
  </div>


@endsection