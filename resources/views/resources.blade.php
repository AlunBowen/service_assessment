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
    <div class="container">
        <div class="row">
            @foreach($assessments as $assessment)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://www.ringcentral.com/us/en/blog/wp-content/uploads/2020/07/Effective-teamwork.png.webp" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p>{{ $assessment->name_en }}</p>
                            <p>{{ $assessment->description_en }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <ul>
        <li>1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
    </ul>

    <p>Lang: {{ Cookie::get('lang') }}</p>
</body>
</html>

