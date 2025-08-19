@extends('layouts.rbac')

@section('content')
<h1 class="text-2xl font-bold">{{ $post->title }}</h1>
<p class="text-gray-600 mb-2">by {{ $post->user->name }}</p>
<p class="whitespace-pre-line">{{ $post->body }}</p>

<div class="mt-4 flex gap-3 text-sm">
    @can('update', $post)
        <a class="underline" href="{{ route('posts.edit', $post) }}">Edit</a>
    @endcan
    @can('delete', $post)
        <form method="POST" action="{{ route('posts.destroy', $post) }}">
            @csrf @method('DELETE')
            <button class="underline" onclick="return confirm('Delete?')">Delete</button>
        </form>
    @endcan
    @can('publish', $post)
        @if(!$post->is_published)
            <form method="POST" action="{{ route('posts.publish', $post) }}">
                @csrf
                <button class="underline">Publish</button>
            </form>
        @endif
    @endcan
</div>
@endsection
