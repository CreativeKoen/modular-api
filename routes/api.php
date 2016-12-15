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

$api = app('Dingo\Api\Routing\Router');

// $api->version('v1', ['middleware' => 'cors'], function ($api) {
$api->version('v1', function ($api) {

    $api->post('authenticate', 'Api\Controllers\AuthController@authenticate');

});

$api->version('v1', ['middleware' => ['api.auth']], function ($api) {

    //--------------------------------------------------------------------------
    // ACL Routes
    //--------------------------------------------------------------------------
    $api->post('refresh', 'Api\Controllers\AuthController@refreshToken');

    $api->get('me', 'Api\Controllers\AuthController@getCurrentUser');

    # getting data
    $api->get('users', 'Api\Controllers\MainController@index');
    $api->get('users/{userID}', 'Api\Controllers\MainController@getUser');
    $api->get('users/{userID}/roles', 'Api\Controllers\MainController@getUserRole');

    $api->get('role/{roleID}/permissions', 'Api\Controllers\MainController@getPermissions');

    # setting data
    $api->post('users/role/add', 'Api\Controllers\MainController@setUserRole');
    $api->post('role/permission/add', 'Api\Controllers\MainController@setPermission');


    //--------------------------------------------------------------------------
    // Data Routes
    //--------------------------------------------------------------------------
    $api->resource('post', 'Api\Controllers\PostController');
});
