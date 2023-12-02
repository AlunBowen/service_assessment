<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<x-nav />
    <h1>Resources</h1>


    @php
        $assessments = App\Models\Assessment::all();
    @endphp

    @foreach($assessments as $assessment)

    //card component
    <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <p>{{ $assessment->name_en }}</p>
        <p>{{ $assessment->description_en }}</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    </div>


    @endforeach
    <ul>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
    </ul>

    <p>Lang: {{ Cookie::get('lang') }}</p>
</body>
</html>

