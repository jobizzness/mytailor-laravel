<?php

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
|
*/
Route::get('/collections/30 beautiful african print for ladies', function(){
		return redirect('collections/30-beautiful-african-print-for-ladies', 301);
});

Route::get('/register', [
		'uses' => 'Auth\RegistrationController@create'
]);
Route::post('/register', [
		'uses' => 'Auth\RegistrationController@store',
		'as'   => 'auth.register'
]);
Route::get('/auth/reset', [
		'uses' => 'Auth\PasswordController@getEmail',
		'as'   => 'auth.login'
]);
Route::post('/auth/reset', [
		'uses' => 'Auth\PasswordController@postEmail',
		'as'   => 'auth.login'
]);
Route::get('/login', [
		'uses' => 'Auth\AuthController@getLogin',
		'as'   => 'auth.login'
	]);
Route::post('/login', [
		'uses' => 'Auth\AuthController@postLogin'
]);
Route::get('/logout', [
		'uses' => 'Auth\AuthController@logout',
		'as'   => 'auth.logout'
	]);

//Social Auth
Route::get('/login/{provider?}',[
		'uses' => 'Auth\SocialAuthController@getSocialAuth',
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

	header('Access-Control-Allow-Origin: *');  //I have also tried the * wildcard and get the same response
	header("Access-Control-Allow-Credentials: true");
	header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
	header('Access-Control-Max-Age: 1000');
	header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');

	/**
	 * Frontend Api Routes
	 */
	Route::resource('shots', 'Frontend\ShotsController');
	Route::resource('explore','Frontend\ExploreController');
	Route::resource('designers', 'Frontend\DesignersController');
	Route::resource('collections', 'Frontend\CollectionsController');
	Route::resource('blog', 'Frontend\BlogController');

	Route::post('/authenticate', [
			'uses'=>'Frontend\AuthController@apiLogin']
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
