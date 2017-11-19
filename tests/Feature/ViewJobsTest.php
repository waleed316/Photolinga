<?php

namespace Tests\Feature;

use Tests\TestCase;

class ViewJobsTest extends TestCase {

	protected $job;

	public function setUp() {
		parent::setUp();

		$this->job = create( 'App\Job' );
	}

	/**
	 * @test
	 */
	public function usersCanViewAllJobs() {
		$this->get( '/jobs' )
		     ->assertSee( $this->job->title );
	}

	/**
	 * @test
	 */
	public function usersCanViewSingleJob() {
		$this->get( $this->job->path() )
		     ->assertSee( $this->job->title );
	}

	/**
	 * @test
	 */
	public function userCanFilterJobsAccordingToACategory() {
		$category         = create( 'App\Category' );
		$jobInCategory    = create( 'App\Job', [ 'category_id' => $category->id ] );
		$jobNotInCategory = create( 'App\Job' );

		$this->get( '/jobs/browse/' . $category->slug )
		     ->assertSee( $jobInCategory->title )
		     ->assertDontSee( $jobNotInCategory->title );
	}

	/**
	 * @test
	 */
	public function userCanFilterJobsByLocation() {
		$jobInKarachi    = create( 'App\Job', [ 'location' => 'Karachi' ] );
		$jobNotInKarachi = create( 'App\Job' );

		$this->get( 'jobs?location=Karachi' )
		     ->assertSee( $jobInKarachi->title )
		     ->assertDontSee( $jobNotInKarachi->title );
	}

}
