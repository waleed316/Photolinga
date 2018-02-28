<?php

namespace App\Http\Controllers;

use App\Proposal;
use Illuminate\Http\Request;
use App\Notification;

class AwardProposalsController extends Controller
{
    public function store( Proposal $proposal )
    {
        $this->authorize( 'award', $proposal->job );
        $proposal->job->awardJob( $proposal );
        $jobid=$proposal->job->id;
        $jobname=$proposal->job->title;
        $freelancer=$proposal->job->freelancer_id;
         $notification=Notification::create([
                                            // 'id'=>1,
                                            'notifiable_type' => 'Hire',
                                            'data'=>"<a class='see-message' href='/jobs/$jobid'>You are hired '$jobname' </a>",
                                            'notifiable_id' => $freelancer,
                                            'type'=>'Hire'
                                            ]);
        
        return redirect( $proposal->job->path() );
    }
}
