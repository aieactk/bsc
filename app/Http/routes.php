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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/projects', 'ProjectController@index');

Route::get('/create-project', function(){
  return view('Project/createProject');
});

Route::post('/submit-project', 'ProjectController@createProject');

Route::get('/project/{projectID}', 'ProjectController@viewDetail');
