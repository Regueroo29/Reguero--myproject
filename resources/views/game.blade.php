<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Supper Tramper 2</title>

    <!-- Game CSS -->
    <link rel="stylesheet" href="{{ asset('css/gamestyle.css') }}">
</head>
<body>

    <!-- Top Navigation -->
    <div class="top-nav">
        <div>
            <a href="{{ url('/') }}">
                <span class="stars">✦</span> IRyStocrats <span class="stars">✦</span>
            </a>
        </div>
        <a href="{{ url('game') }}" class="led-center">WISHUWERHERE</a>
        <div>
            <a href="#">PHP {{ PHP_VERSION }}</a>
        </div>
    </div>

    <!-- Game Canvas -->
    <canvas id="gameCanvas" width="800" height="400"></canvas>

    <!-- Game JS -->
    <script src="{{ asset('js/gamejs.js') }}"></script>
</body>
</html>
