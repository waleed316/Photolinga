<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AwardedJobsTest extends TestCase {

	use DatabaseMigrations;

	/**
	 * @test
	 */
	public function jobContractorCanAwardTheJobToAProposal() {
		$this->signIn();

		$job       = create( 'App\Job', [ 'contractor_id' => auth()->id() ] );
		$proposals = create( 'App\Proposal', [ 'job_id' => $job->id ], 2 );

		$this->assertFalse( $proposals[ 1 ]->isAwarded() );
		$this->post( $proposals[ 1 ]->path() . '/award' );
		$this->assertTrue( $proposals[ 1 ]->fresh()->isAwarded() );
	}

	/**
	 * @test
	 */
	public function notJobContractorCanNotAwardTheJobToAProposal() {

		$this->withExceptionHandling();

		$job       = create( 'App\Job' );
		$proposals = create( 'App\Proposal', [ 'job_id' => $job->id ], 2 );

		$this->assertFalse( $proposals[ 1 ]->isAwarded() );

		// Guests
		$this->post( $proposals[ 1 ]->path() . '/award' );
		$this->assertFalse( $proposals[ 1 ]->fresh()->isAwarded() );

		// Other Users
		$this->signIn()
		     ->post( $proposals[ 1 ]->path() . '/award' );
		$this->assertFalse( $proposals[ 1 ]->fresh()->isAwarded() );
	}

	/**
	 * @test
	 */
	public function AwardedProposalCanNotBeEdited() {
		$this->withExceptionHandling();

		$this->signIn();

		$proposal = create( 'App\Proposal', [ 'user_id' => auth()->id() ] );
		$proposal->job->awardJob( $proposal );

		$updatedBody = "asdsalkjdsldasd";

		$this->patch( $proposal->path(), [ 'body' => $updatedBody ] )
		     ->assertStatus( 403 );

		$this->assertDatabaseMissing( 'proposals', [ 'body' => $updatedBody ] );

	}

}