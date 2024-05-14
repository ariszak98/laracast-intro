<?php

use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    
    return view('home');
});

// Index
Route::get('jobs', function () {
    // or ..->paginate(3);
    // or ..->cursorPaginate(3);
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index', ['jobs' => $jobs]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store
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

// Show
Route::get('/jobs/{id}', function($id) {
        
    $job = Job::find($id) ?? abort(404);
    return view('jobs.show', ['job' => $job]);
        
});

// Edit
Route::get('/jobs/{id}/edit', function($id) {
        
    $job = Job::find($id) ?? abort(404);
    return view('jobs.edit', ['job' => $job]);
        
});

// Update
Route::patch('/jobs/{id}', function($id) {
        
     // Validate..
    request()->validate([
        'title' => ['required', 'min:5'],
        'salary' => ['required']
    ]);
    // authorize (on hold..)

    // update
    $job = Job::find($id) ?? abort(404);
    /*
    * $job->title = request('title');
    * $job->salary = request('salary');
    * $job->save();
    */
    $job->update([
        'title'     => request('title'),
        'salary'    => request('salary')
    ]);

    // redirect
    return redirect('/jobs/' . $job->id); 
      
});

// Delete
Route::delete('/jobs/{id}', function($id) {
        
    // authorize (on hold)
    // delete
    $job = Job::find($id) ?? abort(404);
    $job->delete();

    // redirect
    return redirect('/jobs');    
});

Route::get('/contact', function() {
    return view('contact');
});