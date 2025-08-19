<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $posts = Post::query()
            ->when($user->role !== 'editor' && $user->role !== 'admin', function ($q) use ($user) {
                $q->where(function ($qq) use ($user) {
                    $qq->where('is_published', true)
                        ->orWhere('user_id', $user->id);
                });
            })
            ->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        Gate::authorize('create', Post::class);

        return view('posts.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Post::class);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post = auth()->user()->posts()->create($data + ['is_published' => false]);

        return redirect()->route('posts.edit', $post)->with('status', 'Post created (draft)');
    }

    public function show(Post $post)
    {
        Gate::authorize('view', $post);

        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        // ইউজার তার নিজের পোস্ট এডিট করতে পারবে
        // ইউজার যদি Editor হয়, তবে এডিট করতে পারবে

        Gate::authorize('update', $post);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        Gate::authorize('update', $post);

        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],
        ]);

        $post->update($data);

        return redirect()->route('posts.edit', $post)->with('status', 'Updated');
    }

    public function destroy(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();

        return redirect()->route('posts.index')->with('status', 'Deleted');
    }

    public function publish(Post $post)
    {
        Gate::authorize('publish', $post);
        $post->update(['is_published' => true]);

        return back()->with('status', 'Published');
    }

    public function pending()
    {
        $posts = Post::where('is_published', false)->latest()->paginate(10);

        return view('posts.pending', compact('posts'));
    }
}
