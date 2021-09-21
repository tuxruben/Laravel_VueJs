<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 Route::post('login', 'AuthController@login');
 Route::post('register', 'AuthController@register');
Route::group([

    'middleware' => ['api','auth'],
    'prefix'     => 'auth',

], function ($router) {

Route::post('notes', function () {
    return request(['email', 'password']);
});
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::get('test', function () {
	$user = User::find(1);
	//$user->roles()->sync([2]);
	Gate::authorize('haveaccess', 'role.show');
	return $user;

    //return $user->havePermission('role.create');
});

});

