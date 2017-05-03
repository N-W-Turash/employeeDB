<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// users related routes

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [ 'as' => 'get::users', 'uses' =>'UsersController@index'])->name('home');

Route::get('/users/{user}', [ 'as' => 'get::users::show', 'uses' => 'UsersController@show']);

Route::post('/users', [ 'as' => 'post::users', 'uses' => 'UsersController@store']);

Route::delete('/users/{user}', [ 'as' => 'delete::users::destroy', 'uses' => 'UsersController@destroy']);

Route::put('/users/{user}', [ 'as' => 'put::users::update', 'uses' => 'UsersController@update']);


// tasks related routes

Route::get('/tasks', [ 'as' => 'get::tasks', 'uses' =>'TasksController@index']);

Route::get('/tasks/{task}', [ 'as' => 'get::tasks::show', 'uses' => 'TasksController@show']);

Route::post('/tasks', [ 'as' => 'post::tasks', 'uses' => 'TasksController@store']);

Route::delete('/tasks/{task}', [ 'as' => 'delete::tasks::destroy', 'uses' => 'TasksController@destroy']);

Route::put('/tasks/{task}', [ 'as' => 'put::tasks::update', 'uses' => 'TasksController@update']);



Route::get('/users/{user}/tasks/assigned', [ 'as' => 'get::usersTasks', 'uses' => 'TasksController@usersTasks']);

Route::get('/users/{user}/tasks/assigned-to', [ 'as' => 'get::assignersTasks', 'uses' => 'TasksController@assignersTasks']);


Route::post('/login', 'SessionsController@store');

Route::get('/logout', 'SessionsController@destroy');

Route::get('/get-user', 'SessionsController@getUser');







