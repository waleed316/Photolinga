<?php

namespace App\Listeners;

use App\Events\UserInvited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;

class notifyUser
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
     * @param  UserInvited  $event
     * @return void
     */
    public function handle(UserInvited $event)
    {
        // dd($event);
        $jobid=$event->details->job_id;
        $job='App\Job'::find($jobid);
        $jobname=$job->title;
         $notification=Notification::create([
                                            // 'id'=>1,
                                            'notifiable_type' => 'Invite',
                                            'data'=>"<a class='see-message' href='/jobs/$jobid'>You are invited in '$jobname' </a>",
                                            'notifiable_id' => $event->details->user_id,
                                            'type'=>'Invite'
                                            ]);
         // echo $notification->data;
    }
}
