@extends('layouts.rbac')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Posts</h1>
        @can('create', App\Models\Post::class)
            <a class="underline" href="{{ route('posts.create') }}">+ New Post</a>
        @endcan
    </div>

    <div class="space-y-4">
        @forelse($posts as $post)
            <div class="border p-4">
                <h2 class="font-semibold">
                    <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                    @unless($post->is_published) <span class="text-sm text-orange-600">(draft)</span> @endunless
                </h2>
                <p class="text-sm text-gray-600">by {{ $post->user->name }}</p>

                <div class="mt-2 flex gap-3 text-sm">
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
            </div>
        @empty
            <p>No posts.</p>
        @endforelse
    </div>

    <div class="mt-4">{{ $posts->links() }}</div>
@endsection
