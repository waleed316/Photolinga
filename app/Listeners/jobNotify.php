<?php

namespace App\Listeners;

use App\Events\JobComplete;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;
use App\Mail\JobRated;

class jobNotify
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  JobComplete  $event
     * @return void
     */
    public function handle(JobComplete $event)
    {
        //
         $jobid=$event->job->id;
        // $job='App\Job'::find($event->bid->job_id);
        $jobname=$event->job->title;
        $freelancer=$event->job->freelancer_id;
        $rating=$event->job->rating;
        // $contractor=$job->contractor_id;
        // $jobname=$event->bid->title;
         $notification=Notification::create([
                                            'notifiable_type' => 'JobComplete',
                                            'data'=>"<a class='see-message' href='/profiles/$freelancer'>Job '$jobname' is completed </a>",
                                            'notifiable_id' => $freelancer,
                                            'type'=>'JobComplete'
                                            ]);
         $user='App\User'::find($freelancer);
         \Mail::to($user->email)->send(new JobRated($event->job));

       
    }
}
