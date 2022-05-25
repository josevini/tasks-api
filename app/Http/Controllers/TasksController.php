<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    private function getTask($column, $value) {
        return Task::query()->firstWhere($column, $value);
    }

    public function list($id) {
        $fetch = $this->getTask('id', $id);
        if (empty($fetch)) {
            return response()
                ->json([
                    'code' => '404',
                    'message' => 'task not found'
                ])->setStatusCode(404);
        } else {
            return response()->json($fetch);
        }
    }

    public function listAll() {
        return response()->json(Task::all());
    }

    public function addTask(Request $request) {
        $fetch = $this->getTask('title', $request->input('title'));
        if (!empty($fetch)) {
            return response()
                ->json([
                    'code' => '422',
                    'message' => 'title not available'
                ])->setStatusCode(422);
        } else {
            Task::create([
                'title' => $request->input('title'),
                'description' => $request->input('description')
            ]);
            return response()
                ->json($this->getTask('title', $request->input('title')))
                ->setStatusCode(201);
        }
    }

    public function editTask(Request $request, Task $task) {
        if ($request->input('title')) {
            $task->title = $request->input('title');
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
