<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function apiUser(string $role = 'user'): User
{
    return User::factory()->create(['role' => $role]);
}

it('api index filters by role', function () {
    $admin = apiUser('admin');
    $user = apiUser();

    $uTask = Task::factory()->create(['user_id' => $user->id, 'title' => 'U1']);
    $aTask = Task::factory()->create(['user_id' => $admin->id, 'title' => 'A1']);

    // user sees only own
    $this->actingAs($user, 'sanctum');
    $this->getJson(route('api.tasks.index'))
        ->assertOk()
        ->assertJsonMissing(['title' => 'A1'])
        ->assertJsonFragment(['title' => 'U1']);

    // admin sees all
    $this->actingAs($admin, 'sanctum');
    $this->getJson(route('api.tasks.index'))
        ->assertOk()
        ->assertJsonFragment(['title' => 'A1'])
        ->assertJsonFragment(['title' => 'U1']);
});

it('api store/show/update/destroy works', function () {
    $user = apiUser();
    $other = apiUser();
    $othersTask = Task::factory()->create(['user_id' => $other->id]);

    // store
    $this->actingAs($user, 'sanctum');
    $resp = $this->postJson(route('api.tasks.store'), [
        'title' => 'API Created',
        'description' => 'd',
        'is_completed' => true,
    ]);
    $resp->assertCreated()->assertJsonFragment(['message' => 'Task has been created']);
    $createdId = $resp->json('data.id');

    // show own
    $this->getJson(route('api.tasks.show', $createdId))
        ->assertOk()
        ->assertJsonFragment(['title' => 'API Created']);

    // update own
    $this->putJson(route('api.tasks.update', $createdId), ['title' => 'API Updated'])
        ->assertOk()
        ->assertJsonFragment(['message' => 'Task has been updated'])
        ->assertJsonFragment(['title' => 'API Updated']);

    // cannot view/update/delete others
    $this->getJson(route('api.tasks.show', $othersTask))->assertForbidden();
    $this->putJson(route('api.tasks.update', $othersTask), ['title' => 'X'])->assertForbidden();
    $this->deleteJson(route('api.tasks.destroy', $othersTask))->assertForbidden();

    // delete own
    $this->deleteJson(route('api.tasks.destroy', $createdId))
        ->assertOk()
        ->assertJsonFragment(['message' => 'Task has been deleted']);
});
