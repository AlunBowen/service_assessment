<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div>
<x-nav />
    </div>
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


</body>
</html>

