<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');   // Home page
});

Route::get('/about', function () {
    return view('about');   // About page
});

Route::get('/contact', function () {
    return view('contact'); // Contact page
});

use App\Models\Job;

Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with('employer')->paginate(10) // ✅ now paginated
    ]);
});

