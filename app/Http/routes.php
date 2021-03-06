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
	Route::get('/explore/{slug}', [
			'as' => 'shots.sort',
			'uses' => 'Frontend\ExploreController@show'
	]);
	Route::get('/explore/', [
			'as' => 'shots.sort',
			'uses' => 'Frontend\ExploreController@index'
	]);
	Route::get('/shots/{sort}', [
			'as' => 'shots.sort',
			'uses' => 'Frontend\ShotsController@index'
	]);
	Route::get('/collections/{slug}', [
			'as' => 'shots.sort',
			'uses' => 'Frontend\CollectionsController@show'
	]);
	Route::get('/shot/{id}',  [
					'as' => 'shot',
					'uses' => 'Frontend\ShotsController@show']
	);
	Route::get('/shot/{id}/like',  [
					'as' => 'shot',
					'uses' => 'Frontend\ShotsController@toggleLike']
	);
	Route::get('/designers/{sort}',  [
					'as' => 'designers.sort',
					'uses' => 'Frontend\DesignersController@index']
	);
	Route::post('/shot/viewed/{id}',  [
					'as' => 'shot.viewed',
					'uses' => 'Frontend\ShotsController@viewed']
	);

});

Route::get('/collection',[
		'as' => 'collection',
         'uses' =>'Frontend\ShotsController@shots']);