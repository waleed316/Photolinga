<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class JobsTest extends TestCase {

	use DatabaseMigrations;

	protected $job;

	public function setUp() {
		parent::setUp();

		$this->job = create( 'App\Job' );
	}

	/**
	 * @test
	 */
	public function jobHasAPath() {
		$job = create( 'App\Job' );
		$this->assertEquals(
			"/jobs/{$job->id}", $job->path()
		);
	}

	/**
	 * @test
	 */
	public function jobHasAContractor() {
		$this->assertInstanceOf( 'App\User', $this->job->contractor );
	}

	/**
	 * @test
	 */
	public function jobHasProposals() {
		$this->assertInstanceOf( 'Illuminate\Database\Eloquent\Collection', $this->job->proposals );
	}


}
