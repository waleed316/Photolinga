<?php

function create( $class, $attributes = [] ) {
	return factory( $class )->create( $attributes );
}

function make( $class, $attributes = [] ) {
	return factory( $class )->make( $attributes );
}

function createContractor() {
	return factory( 'App\User' );
}

function createFreelancer() {
	return factory( 'App\User')->create([ 'role' => 'freelancer' ] );
}

function createStudio() {
	return factory( 'App\User')->create([ 'role' => 'studio' ] );
}
