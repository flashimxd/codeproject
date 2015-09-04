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

Route::post('oauth/access_token', function(){
	return Response::json(Authorizer::issueAccessToken());
});


Route::group(['middleware' => 'oauth'], function(){

	Route::resource('client', 'ClientController', ['except' => ['create', 'edit']]);

	Route::resource('project', 'ProjectController', ['except' => ['create', 'edit']]);

	Route::group(['prefix' => 'project'], function(){
		
		Route::get('{id}/task', 'ProjectTaskController@index');
		Route::get('{id}/note', 'ProjectNoteController@index');
		Route::get('{id}/members', 'ProjectMembersController@index');
		Route::post('{id}/note', 'ProjectNoteController@store');
		Route::get('{id}/note/{id_note}', 'ProjectNoteController@show');
		Route::put('{id}/note/{id_note}', 'ProjectNoteController@update');
		Route::delete('{id}/note/{id_note}', 'ProjectNoteController@delete');
	});
});