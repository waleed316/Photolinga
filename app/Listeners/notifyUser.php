<?php

namespace App\Listeners;

use App\Events\UserInvited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;
use App\Mail\Invite;

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
        $user='App\User'::find($job->contractor_id);
        $jobname=$job->title;
        $img;
        if(is_null($user->avatar_path)){
            $img = asset('images/person-2.jpg');             
           
        }
        else{
            $img = asset('storage/'.$user->avatar_path); 
        }
         $notification=Notification::create([
                                            // 'id'=>1,
                                            'notifiable_type' => 'Invite',
                                            'data'=>"<li>
                                            <tr>
                                                <td class='img-top-padding'><a href='' class='message-anchor'><img src='$img' class='message-profile'></a></td>
                                                <td>
                                                    <a href='/jobs/$job->id' class='message-anchor'>
                                                        <h6 class='notification-head'><span class='person-name'>'$user->name'</span>Invited you in a job<span class='event-title'>'$jobname'</span></h6>
                                                    </a>    
                                                </td>",
                                            'notifiable_id' => $event->details->user_id,
                                            'type'=>'Invite'
                                            ]);;
         $user1='App\User'::find($event->details->user_id);
        //  \Mail::to($user1->email)->send(new Invite($job));
        

         // echo $notification->data;
    }
}
