<?php

/**
* Home
*/

Route::get('/', [
	'uses' => '\App\Http\Controllers\HomeController@index',
	'as' => 'home',
]);

/**
* Authentication
*/

Route::get('/signup', [
		'uses' => '\App\Http\Controllers\AuthController@getSignup',
		'as' => 'auth.signup',
		'middleware' => ['guest'],
	]);

Route::post('/signup', [
		'uses' => '\App\Http\Controllers\AuthController@postSignup',
		'middleware' => ['guest'],
	]);

Route::get('/signin', [
		'uses' => '\App\Http\Controllers\AuthController@getSignin',
		'as' => 'auth.signin',
		'middleware' => ['guest'],
	]);

Route::post('/signin', [
		'uses' => '\App\Http\Controllers\AuthController@postSignin',
		'middleware' => ['guest'],
	]);

Route::get('/signout', [
		'uses' => '\App\Http\Controllers\AuthController@getSignout',
		'as' => 'auth.signout',
	]);

/**
*Search
*/

Route::get('/search', [
	'uses' => '\App\Http\Controllers\SearchController@getResults',
	'as' => 'search.results', 
	]);

/**
*User Profile
*/

Route::get('/user/{username}', [
	'uses' => '\App\Http\Controllers\ProfileController@getProfile',
	'as' => 'profile.index', 
	]);

Route::get('/profile/edit', [
	'uses' => '\App\Http\Controllers\ProfileController@getEdit',
	'as' => 'profile.edit', 
	'middleware' => ['auth'],
	]);

Route::post('/profile/edit', [
	'uses' => '\App\Http\Controllers\ProfileController@postEdit',
	'middleware' => ['auth'],
	]);

/**
*Friends
*/

Route::get('/friends', [
		'uses' => '\App\Http\Controllers\FriendController@getIndex',
	'as' => 'friend.index', 
	'middleware' => ['auth'],
	]);

Route::get('/friends/add/{username}', [
		'uses' => '\App\Http\Controllers\FriendController@getAdd',
	'as' => 'friend.add', 
	'middleware' => ['auth'],
	]);

Route::get('/friends/accept/{username}', [
	'uses' => '\App\Http\Controllers\FriendController@getAccept',
	'as' => 'friend.accept', 
	'middleware' => ['auth'],
	]);

/**
*Statuses
*/

Route::post('/status', [
	'uses' => '\App\Http\Controllers\StatusController@postStatus',
	'as' => 'status.post', 
	'middleware' => ['auth'],
	]);

Route::post('/status/{statusId}/reply', [
	'uses' => '\App\Http\Controllers\StatusController@postReply',
	'as' => 'status.reply', 
	'middleware' => ['auth'],
	]);

Route::get('/status/{statusId}/like', [
	'uses' => '\App\Http\Controllers\StatusController@getLike',
	'as' => 'status.like', 
	'middleware' => ['auth'],
	]);