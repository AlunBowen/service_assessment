@extends('layouts.app')

@section('head', 'Assessment')
    
@section('content')
    
    @php
        $user = Auth::user();
        $organisation = App\Models\Organisation::find($user->organisation_id);
        //get all the services for the organisation
        $services = App\Models\Service::where('organisation_id', $organisation->id)->get();
        $localization = json_encode(__('messages'));
        $lang = Cookie::get('lang');  
    @endphp
  
    <h5 class="text-secondary">{{__('messages.Assessment Dashboard')}}: {{ $user->organisation->name }}<h5>
    
  
  
@if (session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif
</div>
<hr />
<br>

    <div id="app">
        <serviceslist :lang="'{{$lang}}'" :localization="'{{$localization}}'"  ></serviceslist>   
    </div>
   
@endsection
