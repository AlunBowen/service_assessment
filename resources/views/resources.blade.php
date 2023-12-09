@extends('layouts.app')

@section('head', 'Resources')
    
@section('content')




    @php
        $assessments = App\Models\Assessment::all();
        $lang = Cookie::get('lang');
    @endphp
    <!-- <div class="container">
        <div class="row">
            @foreach($assessments as $assessment)
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <img src="https://www.ringcentral.com/us/en/blog/wp-content/uploads/2020/07/Effective-teamwork.png.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>{{ $assessment->getAttribute(App\appendLang::append("name_")) }}</p>
                            <p>{{ $assessment->getAttribute(App\appendLang::append("description_")) }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> -->
   
    <form action="{{ route('setLang') }}" method="POST">
                  @csrf
                  
                  <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="lang" value="en">
                  <button type="submit" class="btn btn-danger">Set lang</button>
                </form>
    <p>Lang: {{ Cookie::get('lang') }}</p>
    <div id="app">


        <ResourcesContainer lang={{$lang}} />
    
        
   
   
    </div>
@endsection

