<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplyToJobsTest extends TestCase {

	/**
	 * @test
	 */
	public function guestsCanNotApplyToThreads() {
		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal' );

		$this->withExceptionHandling()
		     ->post( $job->path() . '/proposals', $proposal->toArray() )
		     ->assertRedirect( '/login' );
	}

	/**
	 * @test
	 */
	public function contractorsCanNotApplyToJobs() {
		$user = create( 'App\User', [ 'role' => 'contractor' ] );
		$this->signIn( $user );

		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal' );

		$this->post( $job->path() . '/proposals', $proposal->toArray() )
		     ->assertRedirect( '/' );

		$this->assertDatabaseMissing( 'proposals', [ 'body' => $proposal->body ] );
	}

	/**
	 * @test
	 */
	public function freelancersCanApplyToThreads() {
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn( $user );

		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal' );

		$response = $this->post( $job->path() . '/proposals', $proposal->toArray() );

		$this->assertDatabaseHas( 'proposals', [ 'body' => $proposal->body ] );
	}

	/**
	 * @test
	 */
	public function proposalRequiresABody() {
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->withExceptionHandling()->signIn( $user );

		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal', [ 'body' => null ] );

		$this->post( $job->path() . '/proposals', $proposal->toArray() )
		     ->assertSessionHasErrors( 'body' );
	}

	/**
	 * @test
	 */
	public function jobOwnerCanViewProposalDetail() {
		$user = create( 'App\User' );
		$this->signIn( $user );

		$job      = create( 'App\Job', [ 'contractor_id' => $user->id ] );
		$proposal = make( 'App\Proposal' );

		$this->post( $job->path() . '/proposals', $proposal->toArray() );

		$proposal = $job->proposals[ 0 ];

		$this->get( $proposal->path() )
		     ->assertSee( $proposal->body );
	}

	/**
	 * @test
	 */
	public function notJobOwnerCanNotViewProposalDetail() {
		$this->signIn();

		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal' );

		$this->post( $job->path() . '/proposals', $proposal->toArray() );

		$proposal = $job->proposals[ 0 ];

		$this->get( $proposal->path() )
		     ->assertDontSee( $proposal->body );
	}

	/**
	 * @test
	 */
	public function proposalOwnerCanEditProposal() {
		$this->signIn();

		$proposal = create( 'App\Proposal', [ 'user_id' => auth()->id() ] );

		$updatedBody = 'Edited Body';

		$this->patch( $proposal->path(), [ 'body' => $updatedBody ] );

		$this->assertDatabaseHas( 'proposals', [ 'body' => $updatedBody] );
	}

//	/**
//	 * @test
//	 */
//	public function notProposalOwnersCanNotEditProposal() {
//
//		$proposal = create( 'App\Proposal' );
//
//		$updatedBody = 'EEdited Edited Edited Edited dited Body';
//
//		$this->withExceptionHandling()
//		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
//		     ->assertRedirect( '/login' );
//
//		// Contractors
//		$this->signIn()
//		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
//		     ->assertStatus( 403 );
//
//		//Freelancers
//		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
//		$this->signIn( $user )
//		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
//		     ->assertStatus( 403 );
//	}
}
