<?php



//Event::listen('MyTailor.Modules.Shots.Events.ShotWasPosted', function($event){
//	dd($event);
//});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
*/

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
Route::group(['prefix' => 'api'], function () {
	/**
	 * Frontend Api Routes
	 */
	Route::get('/shots/{sort}', [
			'as' => 'shots.sort',
			'uses' => 'Frontend\ShotsController@index'
	]);
	Route::get('/shot/{id}',  [
					'as' => 'shot',
					'uses' => 'Frontend\ShotsController@show']
	);

	Route::post('/shot/viewed/{id}',  [
					'as' => 'shot.viewed',
					'uses' => 'Frontend\ShotsController@viewed']
	);

});

