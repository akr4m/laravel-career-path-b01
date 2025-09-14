<x-app-layout>
<h1 class="text-2xl font-semibold mb-4">Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-4 rounded shadow">
  @csrf @method('PUT')
  <div class="mb-3">
    <label class="block mb-1 font-medium">Title</label>
    <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title', $task->title) }}" required>
    @error('title') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="mb-3">
    <label class="block mb-1 font-medium">Description</label>
    <textarea name="description" class="w-full border rounded p-2" rows="4">{{ old('description', $task->description) }}</textarea>
    @error('description') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
  </div>

  <div class="mb-4">
    <label class="inline-flex items-center">
      <input type="checkbox" name="is_completed" value="1" class="mr-2" @checked($task->is_completed)>
      <span>Completed</span>
    </label>
  </div>

  <div class="flex items-center gap-2">
    <button class="px-4 py-2 bg-blue-600 text-white rounded">Update</button>
    <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-200 rounded">Cancel</a>
  </div>
</form>
</x-app-layout>
