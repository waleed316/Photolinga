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

     public function Jobcomplete(Request $request)
    {
        $job=Job::find($request->jobid);
        if ($job->freelancer_id == null) 
        {
            $abc[0]['freelancerStatus']="false";
        }
        else
        {
            $abc[0]['freelancerStatus']="true";
            if ($job->completed)
             {
                  $abc[0]['status']='complete';  
             }
             else
             {
                  $abc[0]['status']='incomplete';  
             }
        }
          return response()->json($abc);
    }
}
