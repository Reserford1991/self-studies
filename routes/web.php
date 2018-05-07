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

Route::get('/', function () {
    $tasks = [
      'task 1',
      'task 2',
      'task 3',
    ];
    return view('welcome', compact('tasks'));
});

Route::get('/tasks', function () {
    $tasks = App\Task::all();

    return view('tasks.index', compact('tasks'));
});

Route::get('/task/{task}', function($id) {
    $task  = App\Task::find($id);

    return view('tasks.show', compact('task'));
});

Route::get('/tasks/incomplete', function() {
    $task  = App\Task::incomplete();

    return view('tasks.incomplete', compact('task'));
});
