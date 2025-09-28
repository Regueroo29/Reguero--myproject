<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Home</title>

        <style>
        body {
            margin: 0;
            height: 100vh;
            background: linear-gradient(rgba(0,0,255,0.2), rgba(0,0,50,0.4)),
                        url("{{ asset('images/IRyS_Bae_Calli.jpg') }}") no-repeat center center;
            background-size: cover; /* makes it fit the screen */
        }
        </style>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
    <!-- Link to game.blade.php -->
    <a href="{{ url('game') }}" class="led-center">WISHUWERHERE</a>
    <div class="nav-links">
        <x-nav-link href="{{ url('/') }}" :active="request()->is('/')">Home</x-nav-link>
        <x-nav-link href="{{ url('/about') }}" :active="request()->is('about')">About</x-nav-link>
        <x-nav-link href="{{ url('/contact') }}" :active="request()->is('contact')">Contact</x-nav-link>
        <button id="modeToggle">🌙</button>
    </div>
</div>

<!-- Sidebar -->
<div class="sidebar">
    <div id="sidebar-top">
        <div class="motd">
            <div class="verse-box sunday">
                <p><strong>1 Corinthians 6:18-20</strong></p>
                <p>Flee from sexual immorality... your bodies are temples of the Holy Spirit...</p>
            </div>
            <div class="verse-box monday">
                <p><strong>Proverbs 3:5-6</strong></p>
                <p>Trust in the Lord with all your heart and lean not on your own understanding...</p>
            </div>
            <div class="verse-box tuesday">
                <p><strong>Proverbs 18:22</strong></p>
                <p>He who finds a wife finds what is good and receives favor from the Lord.</p>
            </div>
            <div class="verse-box wednesday">
                <p><strong>Psalms 103:8</strong></p>
                <p>The Lord is compassionate and gracious, slow to anger, abounding in love.</p>
            </div>
            <div class="verse-box thursday">
                <p><strong>Psalms 118:24</strong></p>
                <p>This is the day the Lord has made; let us rejoice and be glad in it.</p>
            </div>
            <div class="verse-box friday">
                <p><strong>Romans 8:28</strong></p>
                <p>And we know that in all things God works for the good of those who love him...</p>
            </div>
            <div class="verse-box saturday">
                <p><strong>2 Timothy 1:7</strong></p>
                <p>For the Spirit God gave us does not make us timid, but gives us power, love and self-discipline.</p>
            </div>
        </div>
    </div>

    <!-- Video -->
    <div id="videoContainer" class="video-container">
        <video id="mainVideo" autoplay muted loop>
            <source src="{{ asset('videos/videoplayback.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <!-- Sidebar Time -->
    <div class="sidebar-datetime">
        <h4 id="sidebar-time">--:--</h4>
        <h3 id="sidebar-day">Loading...</h3>
    </div>
</div>

<!-- Main Content -->
<div id="mainContent" class="content">
    <h3 id="chrono">Chrono: 1m</h3>
    <h1 id="welcomeMsg">✦ Welcome to Our Home ✦</h1>
</div>

<!-- Video Popup -->
<div id="videoPopup" class="video-popup">
    <div class="video-box" id="popupVideoBox"></div>
</div>


<footer></footer>

<!-- JS -->
<script src="{{ asset('js/indexjs.js') }}"></script>
<script src="{{ asset('js/gamejs.js') }}"></script>
</body>
</html>
