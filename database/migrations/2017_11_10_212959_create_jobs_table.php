<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'jobs', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'title' );
			$table->text( 'description' );
			$table->integer( 'budget' );
			$table->unsignedInteger( 'contractor_id' );
			$table->unsignedInteger( 'freelancer_id' )->nullable();
			$table->unsignedInteger( 'awarded_proposal_id' )->nullable();
			$table->boolean( 'in_progress' )->default( false );
			$table->timestamps();
			$table->foreign( 'contractor_id' )
			      ->references( 'id' )
			      ->on( 'users' )
			      ->onDelete( 'cascade' );
			$table->foreign( 'freelancer_id' )
			      ->references( 'id' )
			      ->on( 'users' )
			      ->onDelete( 'set null' );
			$table->foreign( 'awarded_proposal_id' )
			      ->references( 'id' )
			      ->on( 'proposals' )
			      ->onDelete( 'set null' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'jobs' );
	}
}
