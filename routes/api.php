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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');         // Registro
    Route::post('login', 'AuthController@login');               // Login
    Route::get('refresh', 'AuthController@refresh');            // Refresh do token

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('user', 'AuthController@user');              // Obter dados do usuário
        Route::post('logout', 'AuthController@logout');         // Logout
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Rotas de usuário
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
    Route::get('like/is_liked', 'LikeController@isLiked');
});