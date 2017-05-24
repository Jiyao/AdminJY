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
Auth::routes();
Route::get('logout', 'HomeController@logout')->name('getlogout');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    #----------- 用户权限 #
    Route::resource('user', 'UserController');

    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::get('role/permissions/{id}', 'RoleController@Perms')->name('role.perms');
    Route::post('role/permissions', 'RoleController@savePerms');


    Route::resource('menu', 'MenuController');

    #----------- 文章 #
    Route::resource('article', 'ArticleController');
    Route::resource('category', 'CategoryController');
    Route::get('tag', 'TagController@index')->name('tag');
    Route::get('artickes/{tag}/tag', 'ArticleController@listByTag')->name('article.list.tag');
    Route::get('artickes/{category_id}/category', 'ArticleController@listByCategory')->name('article.list.category');
});