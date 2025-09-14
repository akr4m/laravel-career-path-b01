<x-app-layout>
<div class="flex items-center justify-between mb-4">
  <h1 class="text-2xl font-semibold">My Tasks @if(auth()->user()->role === 'admin') (Admin) @endif</h1>
  <a href="{{ route('tasks.create') }}" class="px-3 py-2 bg-blue-600 text-white rounded">+ New Task</a>
  </div>

<div class="bg-white rounded shadow">
  <table class="w-full">
    <thead>
      <tr class="text-left border-b">
        <th class="p-3">Title</th>
        <th class="p-3">Owner</th>
        <th class="p-3">Completed</th>
        <th class="p-3"></th>
      </tr>
    </thead>
    <tbody>
      @forelse ($tasks as $task)
      <tr class="border-b">
        <td class="p-3">{{ $task->title }}</td>
        <td class="p-3">{{ $task->user->name }}</td>
        <td class="p-3">
          @if($task->is_completed)
            <span class="px-2 py-1 bg-emerald-100 text-emerald-800 rounded text-sm">Yes</span>
          @else
            <span class="px-2 py-1 bg-gray-100 text-gray-800 rounded text-sm">No</span>
          @endif
        </td>
        <td class="p-3 text-right">
          @can('update', $task)
            <a href="{{ route('tasks.edit', $task) }}" class="px-3 py-1 bg-yellow-500 text-white rounded">Edit</a>
          @endcan
          @can('delete', $task)
            <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button class="ml-2 px-3 py-1 bg-red-600 text-white rounded" onclick="return confirm('Delete this task?')">Delete</button>
            </form>
          @endcan
        </td>
      </tr>
      @empty
      <tr>
        <td class="p-4" colspan="4">No tasks yet.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>

<div class="mt-4">
  {{ $tasks->links() }}
  </div>
</x-app-layout>
