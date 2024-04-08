
@extends('layouts.app')

@section('head', 'Login')

@section('content')

@php
    $lang = Cookie::get('lang', 'en');
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
    <h1>{{__('messages.login')}}</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">{{ __('messages.email') }}</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('messages.email')}}" required>
            </div>
            <div class="form-group">
                <label for="password">{{ __('messages.password')}}</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="{{ __('messages.password')}}" required>
            </div>
            <br>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>    
            @enderror
            <br>
            <button type="submit" class="btn btn-primary">{{__('messages.login')}}</button>
        </form>
</div>
</div>
</div>

@endsection
