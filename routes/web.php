<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get( '/', 'HomeController@index' );

Route::get( '/jobs', 'JobsController@index' )->name( 'jobs' );
Route::get( '/jobs/{job}', 'JobsController@show' );

Route::post( '/jobs/{job}/proposals', 'ProposalsController@store' );
Route::get( '/proposals/{proposal}', 'ProposalsController@show' );
Route::patch( '/proposals/{proposal}', 'ProposalsController@update' );
Route::delete( '/proposals/{proposal}', 'ProposalsController@destroy' );

Route::get( '/profiles/{user}', 'ProfilesController@show' )->name( 'profile' );
Route::patch( '/profiles/{user}', 'ProfilesController@update' );

Route::post( '/proposals/{proposal}/award', 'AwardProposalsController@store' );

Route::post( '/api/users/{user}/avatar', 'Api\UserAvatarsController@store' )->name( 'avatar' );