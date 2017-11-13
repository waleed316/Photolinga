<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfilesTest extends TestCase {

	use DatabaseMigrations;

	/**
	 * @test
	 */
	function userHasAProfile() {
		$user = create( 'App\User' );

		$this->get( '/profiles/' . $user->id )
		     ->assertSee( $user->name );
	}

	/**
	 * @test
	 */
	public function userProfileShowsPastJobs() {
		$user = create( 'App\User' );
		$job  = create( 'App\Job', [ 'contractor_id' => $user->id ] );
	    $this->get( '/profiles/' . $user->id )
	         ->assertSee( $job->title );
	}

}