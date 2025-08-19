<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use App\Policies\Future\PostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Gate::define('access-admin', function (User $user) {
            return in_array($user->role, ['editor', 'admin']);
        });

        Gate::policy(Post::class, PostPolicy::class);
    }
}
