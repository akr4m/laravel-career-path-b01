@extends('layouts.rbac')

@section('content')
<h1 class="text-xl font-bold mb-4">Create Post</h1>

<form method="POST" action="{{ route('posts.store') }}" class="space-y-3">
    @csrf
    <div>
        <label class="block">Title</label>
        <input name="title" class="border p-2 w-full" value="{{ old('title') }}">
    </div>
    <div>
        <label class="block">Body</label>
        <textarea name="body" class="border p-2 w-full" rows="6">{{ old('body') }}</textarea>
    </div>
    <button class="px-4 py-2 bg-black text-white">Save (Draft)</button>
</form>
@endsection
