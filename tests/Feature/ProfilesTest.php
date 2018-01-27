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
        $job = create('App\Job', [ 'contractor_id' => $user->id ]);
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

        $this->patch('/profiles/' . auth()->id(), [ 'description' => null ])
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
    public function userCanUpdateProfileDescription()
    {
        $this->signIn();

        $description = auth()->user()->description;

        $this->assertDatabaseHas('users', [ 'description' => $description ]);

        $updatedDescription = 'Some Description';

        $this->patch('/profiles/' . auth()->id(), [ 'description' => $updatedDescription ]);
        $this->assertDatabaseHas('users', [ 'description' => $updatedDescription ]);
    }

    /**
     * @test
     */
    public function userCanUpdateOwnProfile()
    {
        $this->signIn();

        $this->patch('/profiles/' . auth()->id(), [ 'description' => "Some Description" ]);

        $this->assertDatabaseHas('users', [ 'description' => "Some Description" ]);
    }

    /**
     * @test
     */
    public function userCanNotUpdateOthersProfile()
    {
        $this->withExceptionHandling();

        $users = create('App\User', [], 2);
        $this->signIn($users[0]);


        $this->patch('/profiles/' . $users[1]->id, [ 'description' => "Some Description" ])
            ->assertStatus(403);

        $this->assertDatabaseMissing('users', [ 'description' => "Some Description" ]);
    }

    /**
     * @test
     */
    public function userCanAddAlbum()
    {
        $this->signIn();
        $album = make('App\Album');
        $this->withExceptionHandling();
        $abc=$this->post('/album/store', $album->toArray())
            ->assertStatus(302);
        $this->assertDatabaseHas('albums', [ 'title' => $album->title ]);
    }

    /**
     * @test
     */
    public function userProfileContainsAlbum()
    {
        $user = create('App\User');
        $portfolio = create('App\Album', [ 'user_id' => $user->id ]);

        $this->get('/profiles/' . $user->id)
            ->assertSee($portfolio->title);
    }

    /**
     * @test
     */
    public function userCanBrowseFreelancers()
    {
        $user = create('App\User');
        $this->get('/profiles')
            ->assertSee($user->name);
    }
}
