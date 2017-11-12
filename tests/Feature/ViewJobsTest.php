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
	public function userCanViewAllJobs() {
		$this->get( '/jobs' )
		     ->assertSee( $this->job->title );
	}

	/**
	 * @test
	 */
	public function userCanViewSingleJob() {
		$this->get( $this->job->path() )
		     ->assertSee( $this->job->title );
	}

}