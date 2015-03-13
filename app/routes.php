<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});

/*
|--------------------------------------------------------------------------
| OAuth2 Implementation
|--------------------------------------------------------------------------
| 
| Here's the developed API with OAuth2 Implementation. Though the API calls is 
| working the OAuth Functionality isn't. It needs a further study.
| You can also help us develop or implement OAuth2 by fixing it for us. :D
*/

Route::group(['prefix' => 'prototype'], function()
{
	Route::group(['prefix' => 'api/v1'], function() 
	{
		Route::resource('staff','StaffAPI');
		Route::resource('faculty', 'FacultyAPI');
		Route::resource('room', 'RoomAPI');
		Route::resource('designation', 'DesignationAPI');
		Route::resource('course', 'BachelorAPI');
		Route::resource('status', 'BachelorAPI');
		Route::resource('user', 'UserAPI');
		Route::resource('subject', 'ProspectusAPI');
	});

	Route::group(['prefix' => 'admin'], function()
	{

	});

	Route::controller('/','HybridController');
});

/*
|--------------------------------------------------------------------------
| Aeon Project Routes
|--------------------------------------------------------------------------
| 
| The Aeon Routes. feel free to change it anytime you want. 
| 
*/
Route::group(['prefix' => 'admin'], function()
{
	Route::resource('subject','ProspectusController');
	Route::resource('user','UserController');
	Route::resource('status','StatusController');
	Route::resource('bachelor','BachelorController');
	Route::resource('course','CourseController');
	Route::resource('designation', 'DesignationController');
	Route::resource('room','RoomController');
	Route::resource('faculty','FacultyController');
	Route::resource('staff','StaffController');
	Route::controller('schedule','PlotterController');
	Route::controller('/','AdminController');
});

/*
|--------------------------------------------------------------------------
| Aeon Project Installation Route
|--------------------------------------------------------------------------
| 
|	Here you can find the Aeon Project Installation Route, you may choose to delete 
| 	this route to disable the access to Installation controller.
|	
*/

//Route::controller('/install','InstallController');


Route::controller('/','PagesController');