<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer.user')->latest()->cursorPaginate(15);
        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function show(Job $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function store()
    {
        //TODO: Authorisation

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
    }

    public function edit(Job $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(Job $job)
    {
        //Validation
        request()->validate([
            'title' => ['required', 'string', 'min:3'],
            'salary' => ['required', 'string'],
        ]);

        //if job is found update and save
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        //if all is done redirect
        return redirect('/jobs/' . $job->id);
    }

    public function destroy(Job $job)
    {
        $job->delete();
        //redirect
        return redirect('/jobs');
    }
}
