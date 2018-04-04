<?php

namespace App\Listeners;

use App\Events\Bidplaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;
use App\Mail\Bid;

// use App\User;

class bidNotify
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
     * @param  Bidplaced  $event
     * @return void
     */
    public function handle(Bidplaced $event)
    {
        //
        // dd($event->bid);

        $proposalid=$event->bid->id;

        $freelancer='App\User'::find($event->bid->user_id);
        $job='App\Job'::find($event->bid->job_id);
        $jobname=$job->title;
        $contractor=$job->contractor_id;
        // $jobname=$event->bid->title;
        $img;
        if(is_null($freelancer->avatar_path)){
            $img = asset('images/person-2.jpg');             
           
        }
        else{
            $img = asset('storage/'.$freelancer->avatar_path); 
        }
         $notification=Notification::create([
                                            // 'id'=>1,
                                            'notifiable_type' => 'Bid',
                                            'data'=>"<a class='see-message' href='/proposals/$proposalid'>New bid on your job  '$jobname' </a>",
                                            'data'=>"<li>
                                            <tr>
                                                <td class='img-top-padding'><a href='' class='message-anchor'><img src='$img' class='message-profile'></a></td>
                                                <td>
                                                    <a href='/proposals/$proposalid' class='message-anchor'>
                                                        <h6 class='notification-head'><span class='person-name'>'$freelancer->name'</span>placed bid in your project<span class='event-title'>'$jobname'</span></h6>
                                                    </a>    
                                                </td>",
                                            'notifiable_id' => $contractor,
                                            'type'=>'bid'
                                            ]);
         $user='App\User'::find($contractor);
        //  \Mail::to($user->email)->send(new Bid($event->bid));
        
    }
}
