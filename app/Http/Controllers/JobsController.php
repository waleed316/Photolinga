<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Job;
use App\Invite;
use App\Events\UserInvited;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware( 'auth' )->except( [ 'index', 'show' ] );
    }

    public function index( Category $category )
    {
        if ( $category->exists ) {
            $jobs = $category->jobs()->orderBy( 'created_at', 'desc' );
        } else {
            $jobs = Job::latest()->orderBy( 'created_at', 'desc' );
        }

        if ( $location = request( 'location' ) ) {
            $jobs->where( 'location','LIKE','%'.$location.'%' )->orderBy( 'created_at' );
        }

        $jobs = $jobs->get();

        return view( 'jobs.index', compact( 'jobs' ) );
    }

    public function show( Job $job )
    {
        $contractorDetail['count']=Job::where('contractor_id',$job->contractor_id)->count();
        $contractorDetail['hire']=Job::where('contractor_id',$job->contractor_id)->whereNotNull('freelancer_id')->count();
        $user='App\User'::find($job->contractor_id);
        $memberSince=$user->created_at;
        $contractorDetail['rate']=$user->rate;
        // dd($user->contactInformation->city);
        $contractorDetail['city']=$user->contactInformation->city;
        $contractorDetail['country']=$user->contactInformation->country;        
        // dd($user);
        $contractorDetail['memberSince']=$memberSince->toFormattedDateString(); 
        return view( 'jobs.show', compact( 'job','contractorDetail' ) );
    }

    public function create()
    {
        return view( 'jobs.create' );
    }

    public function store()
    {
        request()->validate( [
            'title' => 'required',
            'description' => 'required',
            'budget' => 'required',
            'category_id' => 'required|exists:categories,id',
            'location' => 'required'
        ] );
        if(auth()->user()->premium)
        {
            $job = Job::create( [
                'title' => request( 'title' ),
                'category_id' => request( 'category_id' ),
                'contractor_id' => auth()->id(),
                'description' => request( 'description' ),
                'budget' => request( 'budget' ),
                'location' => request( 'location' ),
                'featured'=>1
            ] ); 
        }
        else
        {
        $job = Job::create( [
            'title' => request( 'title' ),
            'category_id' => request( 'category_id' ),
            'contractor_id' => auth()->id(),
            'description' => request( 'description' ),
            'budget' => request( 'budget' ),
            'location' => request( 'location' )
        ] );
        }

        return redirect( $job->path() )->with( 'flash', 'Your job has been Successfully posted' );
    }

    public function invite(Request $request,$id)
    {
        $invite=Invite::create([
            'job_id'=>$request->jobid,
            'user_id'=>$id
        ]);
        event(new UserInvited($invite));
        return redirect()->back();
    }
}
