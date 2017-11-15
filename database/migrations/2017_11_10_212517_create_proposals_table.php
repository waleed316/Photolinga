<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'proposals', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'user_id' );
			$table->unsignedInteger( 'job_id' );
			$table->text( 'body' );
			$table->integer( 'amount' );
			$table->timestamps();
			$table->foreign( 'user_id' )
			      ->references( 'id' )
			      ->on( 'users' )
			      ->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'proposals' );
	}
}
