<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Index
     */
    public function index() {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index', ['jobs' => $jobs]);
    }  


    /**
     * Create
     */
    public function create() {
        return view('jobs.create');
    }


    /**
     * Show
     */
    public function show(Job $job) {
        return view('jobs.show', ['job' => $job]);
    }


    /**
     * Store
     */
    public function store() {
         
        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required']
        ]);

        $job = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 2
        ]);

        Mail::to($job->employer->user->email)->queue(new JobPosted($job));

        return redirect('/jobs');
    }


    /**
     * Edit
     */
    public function edit(Job $job) {

        // Not needed added it at Route Level
        //Gate::authorize('edit-job', $job);
        
        return view('jobs.edit', ['job' => $job]);  
    }


    /**
     * Update
     */
    public function update(Job $job) {

        // Validate..
        request()->validate([
            'title' => ['required', 'min:5'],
            'salary' => ['required']
        ]);

        /*
        * $job->title = request('title');
        * $job->salary = request('salary');
        * $job->save();
        */
        $job->update([
            'title'     => request('title'),
            'salary'    => request('salary')
        ]);

        return redirect('/jobs/' . $job->id); 
    }


    /**
     * Delete
     */
    public function destroy(Job $job) {
        // authorize (on hold)
        $job->delete();
        return redirect('/jobs'); 
    }


}
