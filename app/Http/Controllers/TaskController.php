<?php

namespace App\Http\Controllers;

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
        if ($request->user()->role !== 'admin') {
            $query->where('user_id', $request->user()->id);
        }

        $tasks = $query->latest()->paginate(10);

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        Gate::authorize('create', Task::class);

        return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        Gate::authorize('create', Task::class);

        $validated = $request->validated();

        Task::create([
            'user_id' => $request->user()->id,
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'is_completed' => (bool) ($validated['is_completed'] ?? false),
        ]);

        return redirect()->route('tasks.index')->with('status', 'Task created!');
    }

    public function edit(Task $task)
    {
        Gate::authorize('update', $task);

        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);
        $task->update($request->validated());

        return redirect()->route('tasks.index')->with('status', 'Task updated!');
    }

    public function destroy(Task $task)
    {
        Gate::authorize('delete', $task);
        $task->delete();

        return redirect()->route('tasks.index')->with('status', 'Task deleted!');
    }
}
