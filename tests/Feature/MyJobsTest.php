<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class MyJobsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function userCanBrowseToMyJobs()
    {
        $this->get('/my-jobs')
            ->assertStatus(200);
    }
}