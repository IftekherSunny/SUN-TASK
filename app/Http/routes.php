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


$app->get('/', function () {
    return view('app');
});

$app->get('/reset/{key}', 'ResetController@databaseReset');


/**
 *  API
 **/

$app->group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers'], function () use ($app) {

    $app->get('/tasks', 'TaskController@index');
    $app->get('/tasks/{id}', 'TaskController@show');
    $app->post('/tasks', 'TaskController@store');
    $app->post('/tasks/update', 'TaskController@update');
    $app->delete('/tasks/{id}', 'TaskController@destroy');

});
