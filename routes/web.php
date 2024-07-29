<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;


Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {

    $jobs = Job::with('employer')->latest()->cursorPaginate(15);

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::post('/jobs', function () {
    //Validation
    request()->validate([
        'title' => ['required', 'string', 'min:3'],
        'salary' => ['required', 'string'],
    ]);

    //save the job
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

Route::get('/jobs/create', function () {
    return view('jobs.create');
});

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
