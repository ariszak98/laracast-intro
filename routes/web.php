<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;


// Home
Route::view('/', 'home');

/* Job Related
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
*/

// Contact
Route::view('/contact', 'contact');

// Resource
Route::resource('jobs', JobController::class);

/* Helper:
Route::controller(JobController::class)->group(function(){
    -Route
    -route
    -Route
    ...
});
*/