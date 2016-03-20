<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', '\App\Http\Controllers\Controller@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {
    $api->group(['middleware' => ['api', 'cors']], function ($api) {
        // Endpoints registered here will have the "foo" middleware applied.
        $api->get('modules', ['as' => 'modules.index', 'uses' => 'App\Http\Controllers\Api\V1\ModuleController@index']);
        $api->post('modules', ['as' => 'modules.add', 'uses' => 'App\Http\Controllers\Api\V1\ModuleController@add']);
        $api->get('modules/{id}', ['as' => 'modules.show', 'uses' => 'App\Http\Controllers\Api\V1\ModuleController@show']);

        $api->get('authors', ['as' => 'authors.index', 'uses' => 'App\Http\Controllers\Api\V1\AuthorController@index']);
        $api->get('authors/{id}', ['as' => 'authors.show', 'uses' => 'App\Http\Controllers\Api\V1\AuthorController@show']);
    });
});