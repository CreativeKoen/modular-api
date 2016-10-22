<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');
$api->version('v1', function ($api) {


    $api->post('authenticate', 'App\Http\Controllers\AuthController@authenticate');


    # getting data
    $api->get('users', 'App\Http\Controllers\MainController@index');
    $api->get('users/{userID}', 'App\Http\Controllers\MainController@getUserRole');
    $api->get('users/{userID}/roles', 'App\Http\Controllers\MainController@getUserRole');

    $api->get('role/{roleID}/permissions', 'App\Http\Controllers\MainController@getPermissions');

    # setting data
    $api->post('users/role/add', 'App\Http\Controllers\MainController@attachUserRole');
    $api->post('role/permission/add', 'App\Http\Controllers\MainController@attachPermission');

});
