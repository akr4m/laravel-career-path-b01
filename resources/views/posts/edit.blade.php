@extends('layouts.rbac')

@section('content')
<h1 class="text-xl font-bold mb-4">Edit Post</h1>

<form method="POST" action="{{ route('posts.update', $post) }}" class="space-y-3">
    @csrf @method('PUT')
    <div>
        <label class="block">Title</label>
        <input name="title" class="border p-2 w-full" value="{{ old('title',$post->title) }}">
    </div>
    <div>
        <label class="block">Body</label>
        <textarea name="body" class="border p-2 w-full" rows="6">{{ old('body',$post->body) }}</textarea>
    </div>
    <button class="px-4 py-2 bg-black text-white">Update</button>
</form>
@endsection
