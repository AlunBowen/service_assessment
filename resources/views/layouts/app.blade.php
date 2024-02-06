<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Self Assessment Tool - @yield('head')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
<x-topBar />
@auth
<x-nav />  
@endauth
<div class="container mt-4">
    <div class="row">
    
        
        <div class="col-md-12" >
          
        @yield('content')</div>
</div> 
</div>
</body>
</html>
