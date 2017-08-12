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
Route::get('/', function () {
    return Redirect::to('login');
});
Route::get('/clear-cache', function() {
    $clearCache = Artisan::call('cache:clear');
    $clearConfig = Artisan::call('config:clear');
     return Redirect::to('login');
});
/* Route::get('/', function () {
     return view('welcome');
 }); */
Route::auth('/login');
// Home page redirection
Route::get('/home', 'HomeController@index');
// Group

Route::group(['middleware' => 'auth', 'as' => 'main.'], function (){
	$controllers = array(
			'employee' => 'EmployeeController',
            'category' => 'CategoryController',
            'location' => 'LocationController',
            'service' => 'ServiceController',
            'city' => 'CityController',
            'home' => 'HomeController',
            'rating' => 'RatingController',
            'user' => 'UserController',
            'bookmark' => 'BookmarkController',
            'provider' => 'ServiceProviderController',			
            'review' => 'ReviewController',
			'cms' => 'CmsPagesController'
		);
	foreach ($controllers as $key => $controller){
        //Will generates Crud functions (index,create, edit, delete, update, store)
        Route::get($key . '/index', array('as' => $key . '.index', 'uses' => $controller . '@index'));
        Route::resource($key, $controller);
        Route::post($key . '/index', array('as' => $key . '.search', 'uses' => $controller . '@index'));
        Route::post($key . '/rest', array('as' => $key . '.rest')); // here applied rest route
    }
		
    // Employee
    Route::get('employee/edit/{id}', array('as' => 'employee.edit', 'uses' => 'EmployeeController@edit'));
    Route::delete('employee/destroy/{id}', array('as' => 'employee.destroy', 'uses' => 'EmployeeController@destroy'));
	// Service
    Route::get('service/edit/{id}', array('as' => 'service.edit', 'uses' => 'ServiceController@edit'));
    Route::delete('service/destroy/{id}', array('as' => 'service.destroy', 'uses' => 'ServiceController@destroy'));
    // Category
    Route::get('category/edit/{id}', array('as' => 'category.edit', 'uses' => 'CategoryController@edit'));
    Route::get('category/show/{id}', array('as' => 'category.show', 'uses' => 'CategoryController@show'));
    Route::delete('category/destroy/{id}', array('as' => 'category.destroy', 'uses' => 'CategoryController@destroy'));
    // User
    Route::get('user/edit/{id}', array('as' => 'user.edit', 'uses' => 'UserController@edit'));
    Route::get('user/show/{id}', array('as' => 'user.show', 'uses' => 'UserController@show'));
    Route::delete('user/destroy/{id}', array('as' => 'user.destroy', 'uses' => 'UserController@destroy'));
    // profile update
    Route::get('profileView/{id}', array('as' => 'home.profileView', 'uses' => 'HomeController@profileView'));
    Route::put('updateProfile/{id}', array('as' => 'home.updateProfile', 'uses' => 'HomeController@updateProfile'));
    // Country
    // Route::get('country/edit/{id}', array('as' => 'country.edit', 'uses' => 'CountryController@edit'));
    // Route::get('country/show/{id}', array('as' => 'country.show', 'uses' => 'CountryController@show'));
    // Route::delete('country/destroy/{id}', array('as' => 'country.destroy', 'uses' => 'CountryController@destroy'));
    // City
    Route::get('city/edit/{id}', array('as' => 'city.edit', 'uses' => 'CityController@edit'));
    Route::get('city/show/{id}', array('as' => 'city.show', 'uses' => 'CityController@show'));
    Route::delete('city/destroy/{id}', array('as' => 'city.destroy', 'uses' => 'CityController@destroy'));
	
	// Cms
	Route::get('cms/show/{id}', array('as' => 'cms.show', 'uses' => 'CmsPagesController@show'));
	Route::get('cms/edit/{id}', array('as' => 'cms.edit', 'uses' => 'CmsPagesController@edit'));
	
    // Location
    Route::get('location/edit/{id}', array('as' => 'location.edit', 'uses' => 'LocationController@edit'));
    Route::get('location/show/{id}', array('as' => 'location.show', 'uses' => 'LocationController@show'));
    Route::delete('location/destroy/{id}', array('as' => 'location.destroy', 'uses' => 'LocationController@destroy'));
    // Change Password
    Route::put('updatePassword/{id}', array('as' => 'home.updatePassword', 'uses' => 'HomeController@updatePassword'));
    Route::get('changePassword/{id}', array('as' => 'home.changePassword', 'uses' => 'HomeController@changePassword'));
    // Ratings
    Route::get('rating/edit/{id}', array('as' => 'rating.edit', 'uses' => 'RatingController@edit'));
    Route::get('rating/show/{id}', array('as' => 'rating.show', 'uses' => 'RatingController@show'));
    Route::delete('rating/destroy/{id}', array('as' => 'rating.destroy', 'uses' => 'RatingController@destroy'));
    // Reviews
    Route::get('review/edit/{id}', array('as' => 'review.edit', 'uses' => 'ReviewController@edit'));
    Route::get('review/show/{id}', array('as' => 'review.show', 'uses' => 'ReviewController@show'));
    Route::delete('review/destroy/{id}', array('as' => 'review.destroy', 'uses' => 'ReviewController@destroy'));

    // Category
    Route::get('provider/edit/{id}', array('as' => 'provider.edit', 'uses' => 'ServiceProviderController@edit'));
    Route::get('provider/show/{id}', array('as' => 'provider.show', 'uses' => 'ServiceProviderController@show'));
    Route::delete('provider/destroy/{id}', array('as' => 'provider.destroy', 'uses' => 'ServiceProviderController@destroy'));

});

//Route::resource('webservice', 'WebServiceController');
Route::get('webservice/index', array('as' => 'webservice.index', 'uses' => 'WebServiceController@index'));
Route::get('webservice/getcms/{slug}', array('as' => 'webservice.getcms', 'uses' => 'WebServiceController@getCms'));
Route::post('webservice/register', array('as' => 'webservice.register', 'uses' => 'WebServiceController@register'));

// Route::post('store', 'EmployeeController@store');
Route::get('/logout', 'Auth\LoginController@logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
