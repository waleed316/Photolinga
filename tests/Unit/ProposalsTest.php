<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProposalsTest extends TestCase {

	/**
	 * @test
	 */
	public function hasAnOwner() {
		$proposal = create( 'App\Proposal' );
		$this->assertInstanceOf( 'App\User', $proposal->owner );
	}
}
