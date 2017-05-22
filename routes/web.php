<?php

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'HomeController@logout')->name('getlogout');
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::resource('user', 'UserController');

Route::resource('role', 'RoleController');
Route::resource('permission', 'PermissionController');
Route::get('role/permissions/{id}', 'RoleController@Perms')->name('role.perms');
Route::post('role/permissions', 'RoleController@savePerms');

Route::resource('menu', 'MenuController');

Route::resource('article', 'ArticleController');


Route::get('upload', 'UploadController@index');
Route::post('upload','UploadController@uploadFile');