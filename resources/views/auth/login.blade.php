
@extends('layouts.app')

@section('head', 'Login')

@section('content')
    <!-- Session Status -->
    

    <h1>Login</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="password" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>


@endsection
