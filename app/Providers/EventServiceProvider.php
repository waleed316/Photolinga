<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\Event' => [
        //     'App\Listeners\EventListener',
        // ],
        // 'App\Events\SendMessage' =>
        // [
        //     'App\Listeners\updateConversation',
        // ],
        // 'App\Events\Invite' => [
        //     'App\Listeners\notificatons',
        // ],
        'App\Events\UserInvited' => [
            'App\Listeners\notifyUser',
        ],
         'App\Events\Bidplaced' => [
            'App\Listeners\bidNotify',
        ],
        'App\Events\JobComplete' => [
            'App\Listeners\jobNotify',
        ],
    ];
//     protected $dispatchesEvents = [
//     'invited' => Events\UserInvited::class
// ];
    /**
     * Register any events for your application.
     *
     * @return void
     */
    // public function boot(DispatcherContract $events)
    // {
    //     parent::boot($events);
        // Event::listen('App\Events\UserInvited','App\Listeners\notifyUser');

        //
    // }

     public function boot()
    {
        parent::boot();

        //
    }
    // public function boot()
    // {
       
    // }
}
