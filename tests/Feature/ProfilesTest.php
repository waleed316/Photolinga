<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfilesTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function userHasAProfile()
    {
        $user = create('App\User');

        $this->get('/profiles/' . $user->id)
            ->assertSee($user->name);
    }

    /**
     * @test
     */
    public function userProfileShowsPastJobs()
    {
        $user = create('App\User');
        $job = create('App\Job', ['contractor_id' => $user->id]);
        $this->get('/profiles/' . $user->id)
            ->assertSee($job->title);
    }

    /**
     * @test
     */
    public function userProfileRequiresADescription()
    {
        $this->withExceptionHandling();

        $this->signIn();

        $this->patch('/profiles/' . auth()->id(), ['description' => null])
            ->assertSessionHasErrors('description');
    }

    /**
     * @test
     */
    public function userProfileShowsDescription()
    {
        $user = create('App\User');

        $this->get('/profiles/' . $user->id)
            ->assertSee($user->description);
    }

    /**
     * @test
     */
    public function userCanUpdateOwnProfile()
    {
        $this->signIn();

        $this->patch('/profiles/' . auth()->id(), ['description' => "Some Description"]);

        $this->assertDatabaseHas('users', ['description' => "Some Description"]);
    }

    /**
     * @test
     */
    public function userCanNotUpdateOthersProfile()
    {
        $this->withExceptionHandling();

        $users = create('App\User', [], 2);
        $this->signIn($users[0]);


        $this->patch('/profiles/' . $users[1]->id, ['description' => "Some Description"])
            ->assertStatus(403);

        $this->assertDatabaseMissing('users', ['description' => "Some Description"]);
    }

    /**
     * @test
     */
    public function userCanAddPortfolio()
    {
        $this->signIn();
        $user = create('App\User');
        $portfolio = make( 'App\Portfolio' );
        $this->post('/portfolios',$portfolio->toArray())
            ->assertStatus(200);

        $this->assertDatabaseHas('portfolios',['title'=>$portfolio->title]);
    }
}
