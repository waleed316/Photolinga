<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Proposal' => 'App\Policies\ProposalPolicy',
        'App\Job' => 'App\Policies\JobPolicy',
        'App\User' => 'App\Policies\UserPolicy',
        'App\Album' => 'App\Policies\AlbumPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
