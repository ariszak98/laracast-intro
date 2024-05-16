<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisteredUserController;
use Illuminate\Contracts\Session\Session;

// Home
Route::view('/', 'home');

// Job Related
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class, 'show']);

Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])->middleware('auth')
    ->middleware('auth')
    ->can('edit', 'job');

Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->middleware('auth')
    ->middleware('auth')
    ->can('edit', 'job');


// Register
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

// Sessions
Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);

// Contact
Route::view('/contact', 'contact');

// Resource
//Route::resource('jobs', JobController::class);

/* Helper:
Route::controller(JobController::class)->group(function(){
    -Route
    -route
    -Route
    ...
});
*/