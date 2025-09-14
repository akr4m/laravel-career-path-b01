<?php

use App\Models\Task;
use App\Models\User;

it('has the expected fillable columns', function () {
    $user = new \App\Models\User;
    expect($user->getFillable())->toEqual([
        'name',
        'email',
        'password',
        'provider_name',
        'provider_id',
        'role',
    ]);
});

it('determines if a user is admin', function () {
    $user = User::factory()->create(['role' => 'user']);
    $admin = User::factory()->create(['role' => 'admin']);

    expect($user->isAdmin())->toBeFalse();
    expect($admin->isAdmin())->toBeTrue();
});

it('has tasks relationship', function () {
    $user = User::factory()->create();
    $tasks = Task::factory()->count(3)->create(['user_id' => $user->id]);

    $loaded = $user->tasks;

    expect($loaded)->toHaveCount(3)
        ->and($loaded->pluck('id')->sort()->values()->all())
        ->toEqual($tasks->pluck('id')->sort()->values()->all());
});
