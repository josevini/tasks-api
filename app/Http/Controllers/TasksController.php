<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function list($id) {
        $task = Task::firstWhere('id', $id);
        if (!empty($task)) {
            return response()
                ->json($task)
                ->header('Content-Type', 'application/json');
        } else {
            return response()
                ->json([
                    'code' => '404',
                    'message' => 'Task not found!'
                ])
                ->header('Content-Type', 'application/json')
                ->setStatusCode(404);
        }
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

    public function editTask($id) {
        return 'Edit '.$id;
    }

    public function removeTask($id) {
        return 'Remove '.$id;
    }
}
