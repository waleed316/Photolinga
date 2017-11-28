<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateJobsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function guestsCanNotCreateJobs()
    {
        $this->withExceptionHandling();

        $this->get(route('jobs.create'))
             ->assertRedirect(route('login'));

        $this->post(route('jobs'))
             ->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function aUserCanCreateJobs()
    {
        $this->signIn();

        $job      = make('App\Job');
        $response = $this->post('/jobs', $job->toArray());

        $this->get($response->headers->get('Location'))
             ->assertSee($job->title)
             ->assertSee($job->description);
    }

    /**
     * @test
     */
    public function aJobRequiresATitle()
    {
        $this->withExceptionHandling()->signIn();

        $job      = make('App\Job', [ 'title' => null ]);
        $response = $this->post('/jobs', $job->toArray())
                         ->assertSessionHasErrors('title');
    }

    /**
     * @test
     */
    public function aJobRequiresADescription()
    {
        $this->withExceptionHandling()->signIn();

        $job      = make('App\Job', [ 'description' => null ]);
        $response = $this->post('/jobs', $job->toArray())
                         ->assertSessionHasErrors('description');
    }

    /**
     * @test
     */
    public function aJobRequiresABudget()
    {
        $this->withExceptionHandling()->signIn();

        $job      = make('App\Job', [ 'budget' => null ]);
        $response = $this->post('/jobs', $job->toArray())
                         ->assertSessionHasErrors('budget');
    }

    /**
     * @test
     */
    public function aJobRequiresAValidChannel()
    {
        $this->withExceptionHandling()->signIn();
        create('App\Category', [], 2);

        $job      = make('App\Job', [ 'category_id' => null ]);
        $response = $this->post('/jobs', $job->toArray())
                         ->assertSessionHasErrors('category_id');

        $job      = make('App\Job', [ 'category_id' => 999 ]);
        $response = $this->post('/jobs', $job->toArray())
                         ->assertSessionHasErrors('category_id');

        $job      = make('App\Job', [ 'category_id' => 1 ]);
        $response = $this->post('/jobs', $job->toArray());
        $this->get($response->headers->get('Location'))
             ->assertSee($job->title)
             ->assertSee($job->description);
    }
}
