<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function list(Task $task) {
        return $task;
    }

    public function listAll() {
        return Task::all();
    }

    public function addTask(Request $request) {
        Task::create($request->all());
        return response()
            ->json(Task::firstWhere('name', $request->input('name')))
            ->header('Content-Type', 'application/json')
            ->setStatusCode(201);
    }

    public function editTask(Request $request, Task $task) {
        if ($request->input('name')) {
            $task->name = $request->input('name');
        }
        if ($request->input('description')) {
            $task->description = $request->input('description');
        }
        $task->save();
    }

    public function removeTask(Task $task) {
        $task->delete();
    }
}
