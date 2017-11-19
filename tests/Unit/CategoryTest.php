<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CategoryTest extends TestCase {

	use DatabaseMigrations;

	/**
	 * @test
	 */
	public function aCategoryConsistsOfJobs() {
		$category = create( 'App\Category' );
		$job      = create( 'App\Job', [ 'category_id' => $category->id ] );

		$this->assertTrue( $category->jobs->contains( $job ) );
	}

}