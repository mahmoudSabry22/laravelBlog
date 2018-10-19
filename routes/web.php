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

//index Method which get index view
Route::get('/', 'FrontendManagerController@index')->middleware('auth');

//single method which get page of post
Route::get('/posts/{id}/{title?}', 'FrontendManagerController@single')->middleware('auth');

//addlike method which create like for post
Route::get('/addLike/{post_id}', 'FrontendManagerController@addLike')->name('likes.add');

//removelike method which create dislike for post
Route::get('/removeLike/{post_id}', 'FrontendManagerController@removeLike')->name('likes.remove');

//profile method which get profile of user
Route::get('/profile/{name_user}', 'FrontendManagerController@showProfile')->name('profile')->middleware('auth');

//showposts method which get posts of user who created
Route::get('/showPosts/{id}', 'FrontendManagerController@showPosts')->name('posts.user')->middleware('auth');



//removecomment method which remove your comment
Route::get('/removeComment/{comment_id}', 'FrontendManagerController@removeComment')->name('Comment.delete');



Route::get('/logout', 'FrontendManagerController@logout');

Route::post('commnet/create/{id}', 'CommentsController@store');

Auth::routes();
