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

Route::get('/', 'HomeController@index');

Route::get('/jobs', 'JobsController@index')->name('jobs');
Route::post('/jobs', 'JobsController@store');
Route::get('/jobs/create', 'JobsController@create')->name('jobs.create');
Route::get('/jobs/{job}', 'JobsController@show');

Route::get('/jobs/browse/{category}', 'JobsController@index');

Route::get('/my-jobs', 'MyJobsController@index');

Route::post('/jobs/{job}/proposals', 'ProposalsController@store');
Route::get('/proposals/{proposal}', 'ProposalsController@show');
Route::patch('/proposals/{proposal}', 'ProposalsController@update');
Route::delete('/proposals/{proposal}', 'ProposalsController@destroy');

Route::get('/profiles', 'ProfilesController@index')->name('profiles');
Route::get('/profiles/{user}', 'ProfilesController@show')->name('profile');
Route::patch('/profiles/{user}', 'ProfilesController@update');
Route::get('/profiles/{user}/edit', 'ProfilesController@edit');

Route::post('/proposals/{proposal}/award', 'AwardProposalsController@store');

Route::post('/portfolios', 'PortfoliosController@store');

Route::post('/api/users/{user}/avatar', 'Api\UserAvatarsController@store')->name('avatar');

Route::get('/settings', 'SettingsController@account')->middleware('auth');
Route::get('/settings/security', 'SettingsController@security')->middleware('auth');
Route::patch('/settings/account', 'SettingsController@updateAccount');
Route::patch('/change-password', 'UsersController@changePassword');


Route::view('/terms', 'static.terms');
Route::view('/privacy', 'static.privacy');


Route::post('/UploadImages','PortfoliosController@dropzoneStore')->name('dropzone.store');
Route::post('/remove/image','PortfoliosController@Remove_Image')->
