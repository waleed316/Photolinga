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

Route::get('/', 'HomeController@index')->name('index');

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

Route::post('/portfolios', 'AlbumController@store');

Route::post('/api/users/{user}/avatar', 'Api\UserAvatarsController@store')->name('avatar');

Route::get('/settings', 'SettingsController@account')->middleware('auth');
Route::get('/settings/security', 'SettingsController@security')->middleware('auth');
Route::patch('/settings/account', 'SettingsController@updateAccount');
Route::patch('/change-password', 'UsersController@changePassword');


Route::view('/terms', 'static.terms');
Route::view('/privacy', 'static.privacy');
Route::view('/pro', 'static.pro');


Route::post('/uploadimages/{id}','AlbumController@dropzoneStore')->name('dropzone.store');
Route::post('/remove/image','AlbumController@Remove_Image');


Route::post('/album/store','AlbumController@store')->name('album.store');

Route::get('/search','SkillController@Search')->name('Skill.search');
Route::get('/skill/store','SkillController@Store')->name('skill.store');

Route::post('/skill/delete/{skill}','SkillController@delete')->name('skill.delete');
Route::get('/skillList','SkillController@list')->name('skill.list');
Route::get('/search/photographer','SkillController@PSearch')->name('Skill.psearch');

Route::get('/browsePhotographer','SkillController@browse')->name('Skill.browse');
Route::get('/allPhotographers','SkillController@AllPhotographers');

