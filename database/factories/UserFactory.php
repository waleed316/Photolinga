<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define( App\User::class, function ( Faker $faker ) {
	static $password;

	return [
		'name'           => $faker->name,
		'email'          => $faker->unique()->safeEmail,
		'password'       => $password ?: $password = bcrypt( 'secret' ),
		'is_studio'      => $faker->boolean( 50 ),
		'remember_token' => str_random( 10 ),
	];
} );

$factory->define( App\Job::class, function ( Faker $faker ) {
	return [
		'title'         => $faker->sentence,
		'description'   => $faker->paragraph,
		'budget'        => $faker->numberBetween( 10000, 50000 ),
		'contractor_id' => function () {
			return factory( 'App\User' )->create()->id;
		},
	];
} );

$factory->define( App\Proposal::class, function ( Faker $faker ) {
	return [
		'body'    => $faker->paragraph,
		'job_id'  => function () {
			return factory( 'App\Job' )->create()->id;
		},
		'user_id' => function () {
			return factory( 'App\User' )->create()->id;
		},
		'amount'  => $faker->numberBetween( 1000, 5000 )
	];
} );