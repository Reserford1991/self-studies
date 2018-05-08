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

Route::get('/', 'LaracastsController@index');

/* Laravel from scratch 1-9 lessons */

Route::get('/tasksIndex', 'TasksController@index');
Route::get('/tasks', 'TasksController@all');
Route::get('/task/{task}', 'TasksController@show');
Route::get('/tasks/incomplete', 'TasksController@showIncomplete');


/* Laravel from scratch lessons 10-... (posts) */

Route::get('/postsIndex', 'PostsController@index');
Route::get('/posts/showBlog', 'PostsController@showBlog');
Route::get('/posts/create', 'PostsController@create');
Route::post('/posts', 'PostsController@store');
Route::get('/posts/{post}', 'PostsController@showPost');
