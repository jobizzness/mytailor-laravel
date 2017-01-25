<?php

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/auth/reset', [
		'uses' => 'Auth\PasswordController@getEmail',
		'as'   => 'auth.login'
]);
Route::post('/auth/reset', [
		'uses' => 'Auth\PasswordController@postEmail',
		'as'   => 'auth.login'
]);
Route::get('/register', [
		'uses' => 'Auth\AuthController@getRegister',
		'as'   => 'auth.login'
]);
Route::get('/login', [
		'uses' => 'Auth\AuthController@getLogin',
		'as'   => 'auth.login'
	]);
Route::get('/logout', [
		'uses' => 'Auth\AuthController@logout',
		'as'   => 'auth.logout'
	]);
Route::post('/login', [
		'uses' => 'Auth\AuthController@postLogin'
	]);
Route::post('/register', [
		'uses' => 'Auth\AuthController@postRegister'
	]);

//Social Auth
Route::get('/login/{provider?}',[
		'uses' => 'Auth\AuthController@getSocialAuth',
		'as'   => 'auth.getSocialAuth'
	]);

/*
|--------------------------------------------------------------------------
| Admin Resources
|--------------------------------------------------------------------------
|
*/


//Form to upload shots
Route::get('admin/shots/bulk', [
		'uses' => 'Admin\ShotsController@clean'
]);


//Form to upload shots
Route::get('admin/shots/upload', [
		'as' => 'shots.upload',
		'uses' => 'Admin\ShotsController@create'
]);

// Dashboard page
Route::get('admin', [
		'as' => 'admin.dashboard',
		'uses' => 'Admin\DashboardController@index'
]);

Route::resource('admin/pages', 'Admin\PagesController');
Route::resource('admin/users', 'Admin\UsersController');
Route::resource('admin/shots', 'Admin\ShotsController');
Route::resource('admin/tags', 'Admin\TagsController');
Route::resource('admin/blog', 'Admin\BlogController');



/*
|--------------------------------------------------------------------------
| Restful API For Admin
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix' => 'admin/api'], function () {

	/**
	 * Backed Api
	 */

	//Analytics API
	Route::controllers([
			'ma' => 'Admin\AnalyticsController'
	]);
});

/*
|--------------------------------------------------------------------------
| Restful API for Frontend
|--------------------------------------------------------------------------
|
*/
Route::group(['prefix' => 'api/v1'], function () {
	/**
	 * Frontend Api Routes
	 */
	Route::resource('shots', 'Frontend\ShotsController');
	Route::resource('explore','Frontend\ExploreController');
	Route::resource('designers', 'Frontend\DesignersController');
	Route::resource('collections', 'Frontend\CollectionController');
	Route::resource('blog', 'Frontend\BlogController');

	Route::post('/login', [
			'uses'=>'Frontend\CollectionController@login']
	);

	Route::post('/shots/{id}/like',  [
					'as' => 'shot',
					'uses' => 'Frontend\ShotsController@toggleLike']
	);
	Route::post('/shots/{id}/viewed',  [
					'as' => 'shot.viewed',
					'uses' => 'Frontend\ShotsController@viewed']
	);
	Route::get('/{username}/shots',  [
					'as' => 'designers.sort',
					'uses' => 'Frontend\ShotsController@by']
	);


});
