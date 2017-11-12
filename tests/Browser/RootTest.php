<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RootTest extends DuskTestCase {

	/**
	 * A basic browser test example.
	 *
	 * @return void
	 */
	public function guestsWillSeeLandingPage() {
		$this->browse( function ( Browser $browser ) {
			$browser->visit( '/' )
			        ->assertSee( 'Don\'t Just Dream, Do' );
		} );
	}

	/**
	 * @test
	 */
	public function registeredUsersWillNotSeeLandingPage() {
		$this->browse( function ( Browser $browser ) {
			$browser->loginAs( create( 'App\User' ) )
			        ->visit( '/' )
			        ->assertDontSee( 'Don\'t Just Dream, Do' );
		} );
	}

	/**
	 * @test
	 */
	public function registeredFreelancersWillSeeJobsPage() {
		$this->browse( function ( Browser $browser ) {
			$browser->loginAs( create( 'App\User' ,['user_type' => 0]) )
			        ->visit( '/' )
			        ->assertPathIs('/jobs');
		} );
	}
}
