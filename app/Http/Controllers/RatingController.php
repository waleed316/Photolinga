<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use DB;

class RatingController extends Controller
{
    //
    public function store(Request $request)
    {
    	$job=Job::find($request->jobid);
    	$job->rating=$request->ratings;
        $job->in_progress = 0;
        $job->completed=1;
    	$job->save();

    	$avgJob=DB::table('jobs')
    	->where('freelancer_id','=',$job->freelancer_id)
    	->avg('rating');

    	$userRating=User::find($job->freelancer_id);
    	$userRating->rating=$avgJob;
    	$userRating->save();

    	return response()->json($avgJob);

    }
}
