@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    <h1>Assessment</h1>


    @php
        $assessments = App\Models\Assessment::all();
    @endphp

    @foreach($assessments as $assessment)
        <p>{{ $assessment->name }}</p>
        <p>{{ $assessment->description }}</p>
    @endforeach
    <ul>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
    </ul>


    <form action="{{ route('set-lang') }}" method="POST">
                  @csrf
                  
                  <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="lang" value="en">
                  <button type="submit" class="btn btn-danger">Set lang</button>
                </form>

@endsection

