<?php

use App\Models\Task;
use App\Models\User;

it('has the expected fillable columns', function () {
    $task = new \App\Models\Task;
    expect($task->getFillable())->toEqual([
        'user_id', 'title', 'description', 'is_completed',
    ]);
});

it('casts is_completed to boolean', function () {
    $task = Task::factory()->create(['is_completed' => 1]);
    $task->refresh();
    expect($task->is_completed)->toBeTrue();

    $task = Task::factory()->create(['is_completed' => 0]);
    $task->refresh();
    expect($task->is_completed)->toBeFalse();
});

it('belongs to a user', function () {
    $user = User::factory()->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $relUser = $task->user;

    expect($relUser)->not->toBeNull()
        ->and($relUser->id)->toBe($user->id);
});
