<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class JobsController extends Controller {

	public function index() {
		$jobs = Job::latest()->get();

		return view( 'jobs.index', compact( 'jobs' ) );
	}

	public function show(Job $job) {
		return view('jobs.show',compact('job'));
	}
}