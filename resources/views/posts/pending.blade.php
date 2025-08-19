@extends('layouts.rbac')

@section('content')
<h1 class="text-xl font-bold mb-4">Pending Posts (Editors)</h1>

@forelse($posts as $post)
    <div class="border p-4 mb-3">
        <h2 class="font-semibold">{{ $post->title }}</h2>
        <p class="text-sm text-gray-600">by {{ $post->user->name }}</p>
        <div class="mt-2 flex gap-3">
            <a class="underline" href="{{ route('posts.show', $post) }}">View</a>
            @can('publish', $post)
            <form method="POST" action="{{ route('posts.publish', $post) }}">
                @csrf
                <button class="underline">Publish</button>
            </form>
            @endcan
        </div>
    </div>
@empty
    <p>No pending posts.</p>
@endforelse

<div class="mt-4">{{ $posts->links() }}</div>
@endsection
