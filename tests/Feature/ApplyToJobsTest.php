<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApplyToJobsTest extends TestCase {

	/**
	 * @test
	 */
	public function guestsCanNotApplyToJobs() {
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
		$user = create( 'App\User' );
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
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn();

		$contractor = auth()->user();

		$job      = create( 'App\Job', [ 'contractor_id' => auth()->id() ] );
		$proposal = make( 'App\Proposal' );

		$this->signIn( $user )
		     ->post( $job->path() . '/proposals', $proposal->toArray() );

		$proposal = $job->proposals[ 0 ];

		$this->signIn( $contractor )
		     ->get( $proposal->path() )
		     ->assertSee( $proposal->body );
	}

	/**
	 * @test
	 */
	public function notJobOwnerCanNotViewProposalDetail() {
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn();

		$job      = create( 'App\Job' );
		$proposal = make( 'App\Proposal' );

		$this->signIn( $user )
		     ->post( $job->path() . '/proposals', $proposal->toArray() );

		$proposal = $job->proposals[ 0 ];

		$this->get( $proposal->path() )
		     ->assertDontSee( $proposal->body );
	}

	/**
	 * @test
	 */
	public function proposalOwnerCanEditProposal() {
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn( $user );

		$proposal = create( 'App\Proposal', [ 'user_id' => auth()->id() ] );

		$updatedBody = 'Edited Body';

		$this->patch( $proposal->path(), [ 'body' => $updatedBody ] );

		$this->assertDatabaseHas( 'proposals', [ 'body' => $updatedBody ] );
	}

	/**
	 * @test
	 */
	public function notProposalOwnersCanNotEditProposal() {

		$proposal = create( 'App\Proposal' );

		$updatedBody = 'EEdited Edited Edited Edited dited Body';

		$this->withExceptionHandling()
		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
		     ->assertRedirect( '/login' );

		//		 Contractors
		$this->signIn()
		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
		     ->assertRedirect( '/' );

		//		//Freelancers
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn( $user )
		     ->patch( $proposal->path(), [ 'body' => $updatedBody ] )
		     ->assertStatus( 403 );

		$this->assertDatabaseMissing( 'proposals', [ 'body' => $updatedBody ] );
	}

	/**
	 * @test
	 */
	public function proposalOwnerCanDeleteProposal() {
		$user = createFreelancer();
		$this->signIn( $user );

		$proposal = create( 'App\Proposal', [ 'user_id' => auth()->id() ] );
		$this->delete( $proposal->path() )->assertStatus( 302 );
		$this->assertDatabaseMissing( 'proposals', [ 'id' => $proposal->id ] );
		$this->assertEquals( 0, $proposal->job->fresh()->proposals_count );
	}

	/**
	 * @test
	 */
	public function notProposalOwnersCanNotDeleteProposals() {
		$proposal = create( 'App\Proposal' );

		$this->withExceptionHandling()
		     ->delete( $proposal->path() )
		     ->assertRedirect( '/login' );

		//		 Contractors
		$this->signIn()
		     ->delete( $proposal->path() )
		     ->assertRedirect( '/' );

		//		//Freelancers
		$user = create( 'App\User', [ 'role' => 'freelancer' ] );
		$this->signIn( $user )
		     ->delete( $proposal->path() )
		     ->assertStatus( 403 );

		$this->assertDatabaseHas( 'proposals', [ 'id' => $proposal->id ] );
	}
}
