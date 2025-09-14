<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Task::class);

        $query = Task::query();

        if (! $request->user()->isAdmin()) {
            $query->where('user_id', $request->user()->id);
        }

        return response()->json([
            'data' => $query->latest()->get(),
        ]);
    }

    public function store(StoreTaskRequest $request)
    {
        Gate::authorize('create', Task::class);

        $validated = $request->validated();

        $task = Task::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'is_completed' => (bool) ($validated['is_completed'] ?? false),
        ]);

        return response()->json([
            'message' => 'Task has been created',
            'data' => $task,
        ], 201);
    }

    public function show(Task $task)
    {
        Gate::authorize('view', $task);

        return response()->json(['data' => $task]);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);

        $task->fill($request->validated());
        $task->save();

        return response()->json([
            'message' => 'Task has been updated',
            'data' => $task,
        ]);
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);

        $task->delete();

        return response()->json([
            'message' => 'Task has been deleted',
        ]);
    }
}
