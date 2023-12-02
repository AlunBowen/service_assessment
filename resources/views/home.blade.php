@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    

    
    <h1>{{(Cookie::get('lang') == 'en' || Cookie::get('lang') == null) ? 'Assessment' : 'Assesun'}}</h1>
       


    @php
        $assessments = App\Models\Assessment::all();
    @endphp
    
        
    @foreach($assessments as $assessment)
    @if (Cookie::get('lang') == 'en' || Cookie::get('lang') == null)
        <p>{{ $assessment->name_en }}</p>
        <p>{{ $assessment->description_en }}</p>
    @else
        <p>{{ $assessment->name_cym }}</p>
        <p>{{ $assessment->description_cym }}</p>
    @endif
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


    <p>Lang: {{ Cookie::get('lang') }}</p>

@endsection

