<?php

namespace App\Policies\Future;

use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    // 1. Create a post (is_published = false)
    // 2. Editor: he can publish
    // 3. Who can view? যে লিখেছে ওই পোস্ট অথবা এডিটর

    public function view(?User $user, Post $post): bool
    {
        // if login,
        // $user's own post or if the user has 'editor' role
        // then he can view
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
