<?php

use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt( 'secret' ),
        'is_studio' => $faker->boolean( 50 ),
        'remember_token' => str_random( 10 ),
        'phoneNo'=>$faker->phoneNumber,
        'description' => $faker->paragraph,
        'phoneNo'=>$faker->phoneNumber,
    ];
} );

$factory->define( App\Job::class, function ( Faker $faker ) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'budget' => $faker->numberBetween( 10000, 50000 ),
        'contractor_id' => function () {
            return factory( 'App\User' )->create()->id;
        },
        'category_id' => function () {
            return factory( 'App\Category' )->create()->id;
        },
        'location' => $faker->city
    ];
} );

$factory->define( App\Proposal::class, function ( Faker $faker ) {
    return [
        'body' => $faker->paragraph,
        'job_id' => function () {
            return factory( 'App\Job' )->create()->id;
        },
        'user_id' => function () {
            return factory( 'App\User' )->create()->id;
        },
        'amount' => $faker->numberBetween( 1000, 5000 )
    ];
} );

$factory->define( App\Category::class, function ( Faker $faker ) {
    $name = $faker->word;

    return [
        'name' => $name,
        'slug' => $name
    ];
} );

        Storage::fake('public');


$factory->define( App\Album::class, function ( Faker $faker ) {
    return [
        'title' => $faker->word,
        'thumbnail'=>UploadedFile::fake()->image('avatar.jpg'),
        'user_id' => function () {
            return factory( 'App\User' )->create()->id;
        }
    ];
} );
