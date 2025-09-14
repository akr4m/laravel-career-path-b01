<?php

use App\Models\Task;
use App\Models\User;

// Helper: get admin and user
function adminUser()
{
    return User::where('role', 'admin')->first() ?? User::factory()->create(['role' => 'admin']);
}
function normalUser()
{
    return User::where('role', 'user')->first() ?? User::factory()->create(['role' => 'user']);
}

it('rejects unauthenticated access', function () {
    $task = Task::factory()->create();
    $this->getJson('/api/tasks')->assertUnauthorized();
    $this->postJson('/api/tasks', [])->assertUnauthorized();
    $this->getJson('/api/tasks/'.$task->id)->assertUnauthorized();
    $this->putJson('/api/tasks/'.$task->id, [])->assertUnauthorized();
    $this->deleteJson('/api/tasks/'.$task->id)->assertUnauthorized();
});

it('user can CRUD own tasks, not others', function () {
    $user = normalUser();
    $this->actingAs($user, 'sanctum'); // use sanctum guard
    // Create
    $resp = $this->postJson('/api/tasks', [
        'title' => 'My Task',
        'description' => 'desc',
        'is_completed' => true,
    ]);
    $resp->assertCreated()->assertJsonPath('data.title', 'My Task');
    $taskId = $resp['data']['id'];
    // Read own
    $this->getJson('/api/tasks')->assertOk()->assertJsonPath('data.0.id', $taskId);
    $this->getJson('/api/tasks/'.$taskId)->assertOk()->assertJsonPath('data.id', $taskId);
    // Update own
    $this->putJson('/api/tasks/'.$taskId, ['title' => 'Updated'])->assertOk()->assertJsonPath('data.title', 'Updated');
    // Delete own
    $this->deleteJson('/api/tasks/'.$taskId)->assertOk();
    // Cannot access others
    $other = Task::factory()->create();
    $this->getJson('/api/tasks/'.$other->id)->assertForbidden();
    $this->putJson('/api/tasks/'.$other->id, ['title' => 'X'])->assertForbidden();
    $this->deleteJson('/api/tasks/'.$other->id)->assertForbidden();
});

it('admin can CRUD any task', function () {
    $admin = adminUser();
    $user = normalUser();
    $task = Task::factory()->for($user)->create(['title' => 'User Task']);
    $this->actingAs($admin, 'sanctum');
    // Index sees all
    $this->getJson('/api/tasks')->assertOk()->assertJson(fn ($json) => $json->has('data', 1));
    // Show any
    $this->getJson('/api/tasks/'.$task->id)->assertOk()->assertJsonPath('data.title', 'User Task');
    // Update any
    $this->putJson('/api/tasks/'.$task->id, ['title' => 'Admin Edit'])->assertOk()->assertJsonPath('data.title', 'Admin Edit');
    // Delete any
    $this->deleteJson('/api/tasks/'.$task->id)->assertOk();
});

it('validates required fields', function () {
    $user = normalUser();
    $this->actingAs($user, 'sanctum');
    $this->postJson('/api/tasks', [])->assertStatus(422)->assertJsonValidationErrors(['title']);
    $task = Task::factory()->for($user)->create();
    $this->putJson('/api/tasks/'.$task->id, ['title' => ''])->assertStatus(422)->assertJsonValidationErrors(['title']);
});
