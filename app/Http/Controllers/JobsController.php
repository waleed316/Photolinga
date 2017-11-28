<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except([ 'index', 'show' ]);
    }

    public function index(Category $category)
    {
        if ($category->exists) {
            $jobs = $category->jobs()->orderBy('updated_at');
        } else {
            $jobs = Job::latest();
        }

        if ($location = request('location')) {
            $jobs->where('location', $location);
        }

        $jobs = $jobs->get();

        return view('jobs.index', compact('jobs'));
    }

    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
        request()->validate([
            'title'       => 'required',
            'description' => 'required',
            'budget'      => 'required',
            'category_id' => 'required|exists:categories,id',
            'location'    => 'required'
        ]);
        $job = Job::create([
            'title'         => request('title'),
            'category_id'   => request('category_id'),
            'contractor_id' => auth()->id(),
            'description'   => request('description'),
            'budget'        => request('budget'),
            'location'      => request('location')
        ]);

        return redirect($job->path());
    }
}
