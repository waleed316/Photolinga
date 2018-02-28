<?php

namespace App\Listeners;

use App\Events\Bidplaced;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notification;

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
        $job='App\Job'::find($event->bid->job_id);
        $jobname=$job->title;
        $contractor=$job->contractor_id;
        // $jobname=$event->bid->title;
         $notification=Notification::create([
                                            // 'id'=>1,
                                            'notifiable_type' => 'Bid',
                                            'data'=>"<a class='see-message' href='/proposals/$proposalid'>New bid on you job  '$jobname' </a>",
                                            'notifiable_id' => $contractor,
                                            'type'=>'bid'
                                            ]);
        
    }
}
