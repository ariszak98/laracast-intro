<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    
    return view('home');
});

Route::get('jobs', function () {
    // or ..->paginate(3);
    // or ..->cursorPaginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::post('/jobs', function () {

    // Validate..
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required']
    ]);

    // Create Job
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 2
    ]);

    // Redirect
    return redirect('/jobs');
});

Route::get('/jobs/{id}', function($id) {
        
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
        
});


Route::get('/contact', function() {
    return view('contact');
});