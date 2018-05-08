<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function index() {
        return view('tasks.index');
    }

    public function all(){
        $tasks = Task::all();
        return view('tasks.all', compact('tasks'));
    }

    public function show(Task $task) {
//        $task  = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    public function showIncomplete() {
        $tasks  = Task::incomplete()->get();
        $subset = $tasks->map(function ($task) {
            return collect($task->toArray())
              ->only(['id', 'body', 'created_at'])
              ->all();
        });
        return view('tasks.incomplete', compact('subset'));
    }
}
