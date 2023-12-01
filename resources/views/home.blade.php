<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <script src="{{ asset('build/assets/app-a83ed21d.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app-4c3504b5.css') }}">
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

<button type="button" class="btn btn-primary">Primary</button>
</body>
</html>

