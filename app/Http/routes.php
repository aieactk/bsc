<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//Project routes..
Route::get('/projects',                 'ProjectController@index');
Route::get('/create-project',           'ProjectController@createProjectForm');
Route::post('/submit-project',          'ProjectController@createProject');
Route::get('/project/{projectID}',      'ProjectController@viewDetail');
Route::get('/edit-project/{projectID}', 'ProjectController@viewEditDetail');
Route::post('/update-project',          'ProjectController@updateProject');
Route::get('/delete-project/{id}',      'ProjectController@deleteProject');
Route::get('/thank-you',                'ProjectController@thankYou');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Profile
Route::get('/profile', 'ProfileController@index');
Route::post('/profile', 'ProfileController@save');
Route::post('/profile/image', 'ProfileController@image');
Route::get('/members/{id}', 'ProfileController@view');

// Message
Route::get('/members/{id}/message', 'MessageController@compose');
Route::post('/members/{id}/message', 'MessageController@send');
Route::post('/messages/delete', 'MessageController@delete');
Route::get('/messages/{id}', 'MessageController@reply');
Route::post('/messages/{id}', 'MessageController@respond');
Route::get('/messages', 'MessageController@inbox');
