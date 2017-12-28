<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MyJobsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function userCanBrowseToMyJobsPage()
    {
        $this->signIn($user = create('App\User'));
        $createdJob = create('App\Job', [ 'contractor_id' => $user->id ]);
        $proposal = create('App\Proposal', [ 'user_id' => $user->id ]);
        $appliedJob = create('App\Job');
        $appliedJob->awardJob($proposal);
        $this->get('/my-jobs')
            ->assertSee($createdJob->title)
            ->assertSee($appliedJob->title);
    }
}