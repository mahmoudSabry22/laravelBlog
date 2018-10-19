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

Route::group(['middleware' => ['admin']], function () {

    Route::get('/', 'AdminController@index');
    Route::get('/logout', 'AdminController@logout');
    Route::resource('/users', 'UsersController');

    Route::resource('/cats', 'CatsController');
    Route::resource('/tags', 'TagsController');
    Route::resource('/posts', 'PostsController');
});
