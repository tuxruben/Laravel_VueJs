<?php

use App\Events\UserRegistered;
use App\Permission;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});
/*Route::get('/test', function () {
return Role::create(['name' => 'Admin',
'slug'                      => 'admin',
'description'               => 'Administrador',
'full-access'               => 'yes',

]);
});*/
/*Route::get('/test', function () {
return Role::create(['name' => 'Guest',
'slug'                      => 'guest',
'description'               => 'guest',
'full-access'               => 'no',

]);
});*/

/*Route::get('/test', function () {
    return Permission::create(['name' => 'List product',
        'slug'                            => 'product.index',
        'description'                     => 'A user can List permission',

    ]);
});*/
Route::get('/test', function () {
	$user = User::find(1);
    event(new UserRegistered($user));
	//$user->roles()->sync([2]);
	//Gate::authorize('haveaccess');
	return Auth::user();
    //return $user->havePermission('role.create');
});

Route::get('/test1', function () {
    $role = Role::find(2); //buscamos el usuario
    $role->permissions()->sync([1, 2]); // con attach estamos guardando un rol o varios roles que queremos que se le asigne a este usario
    return $role->permissions;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/role', 'RoleController')->names('role');
Route::resource('/user', 'UserController',['except'=>[ 'create','store']])->names('user');
Route::get('/mail', 'MailController@getMail');
