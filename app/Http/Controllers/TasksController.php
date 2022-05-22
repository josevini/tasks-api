<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    public function list($id) {
        $task = DB::table('tasks')
            ->select(['id', 'name', 'description'])
            ->where('id', $id)
            ->get();

        if (count($task)) {
            return response()->json($task)
                ->header('Content-Type', 'application/json');
        } else {
            return response()->json([
                'code' => '404',
                'message' => 'Task not found!',
            ])
                ->header('Content-Type', 'application/json')
                ->setStatusCode(404);
        }
    }

    public function listAll() {
        return 'List all...';
    }

    public function addTask() {
        return 'Add...';
    }

    public function editTask($id) {
        return 'Edit '.$id;
    }

    public function removeTask($id) {
        return 'Remove '.$id;
    }
}
