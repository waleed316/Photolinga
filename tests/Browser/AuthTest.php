<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class AuthTest extends DuskTestCase {

	/**
	 * @test
	 */
	public function userCanLogin() {
		$user = create( 'App\User' );

		$this->browse( function ( Browser $browser ) use ( $user ) {
			$browser->visit( '/login' )
			        ->type( 'email', $user->email )
			        ->type( 'password', 'secret' )
			        ->press( 'Login' )
			        ->assertPathIs( '/jobs' );
		} );
	}

	/**
	 * @test
	 */
	public function userCanRegister() {
		$user = make( 'App\User' );

		$this->browse( function ( Browser $browser ) use ( $user ) {
			$browser->visit( '/register' )
//			        ->type( 'name', $user->name )
			        ->type( 'email', $user->email )
			        ->type( 'password', 'secret' )
			        ->type( 'confirm_password', 'secret' )
			        ->press( 'Register' )
			        ->assertPathIs( '/jobs' );
		} );
	}
}
