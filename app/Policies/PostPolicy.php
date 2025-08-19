<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    public function view(?User $user, Post $post): bool
    {
        return $post->is_published
            || ($user && ($user->id === $post->user_id || $user->role === 'editor'));
    }

    public function create(User $user): bool
    {
        return in_array($user->role, ['author', 'editor', 'admin']);
    }

    public function update(User $user, Post $post): bool
    {
        return $user->id === $post->user_id || in_array($user->role, ['editor', 'admin']);
    }

    public function delete(User $user, Post $post): bool
    {
        return in_array($user->role, ['editor', 'admin']);
    }

    public function publish(User $user, Post $post): bool
    {
        return in_array($user->role, ['editor', 'admin']);
    }
}
