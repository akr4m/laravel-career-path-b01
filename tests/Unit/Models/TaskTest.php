<?php

use App\Models\Task;

it('has the expected fillable columns', function () {
    $task = new Task;

    expect($task->getFillable())->toEqual([
        'title', 'description', 'is_completed',
    ]);
});

it('casts is_completed to boolean', function () {
    // Task 1
    $task = Task::factory()->create(['title' => 'homework', 'is_completed' => 1]);
    expect($task->is_completed)->toBeTrue();

    // Task 2
    $task2 = Task::factory()->create(['is_completed' => 0]);
    expect($task2->is_completed)->toBeFalse();

    // database test
    $this->assertDatabaseCount('tasks', 2);
    $this->assertDatabaseHas('tasks', [
        'title' => 'homework',
    ]);
});

it('belongs to a user', function () {
    // $task = Task::factory()->create();
    // expect($task->user)->toBeInstanceOf(\App\Models\User::class);

    $user = \App\Models\User::factory()->create();
    // $task = Task::factory()->for($user)->create();
    $task = Task::factory()->create(['user_id' => $user->id]);

    $relUser = $task->user;

    expect($relUser)->not->tobeNull()
        ->and($relUser->id)->toEqual($user->id)
        ->and($task->user_id)->toEqual($user->id);
});
