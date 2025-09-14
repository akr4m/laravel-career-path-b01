<?php

use App\Models\Task;
use App\Models\User;

function makeUser(string $role = 'user'): User
{
    return User::factory()->create(['role' => $role]);
}

it('web index shows own tasks for user and all for admin', function () {
    $admin = makeUser('admin');
    $user = makeUser();
    $own = Task::factory()->create(['user_id' => $user->id, 'title' => 'U1']);
    $others = Task::factory()->create(['user_id' => $admin->id, 'title' => 'A1']);

    $this->actingAs($user);
    $this->get(route('tasks.index'))->assertOk()->assertSee('U1')->assertDontSee('A1');

    $this->actingAs($admin);
    $this->get(route('tasks.index'))->assertOk()->assertSee('U1')->assertSee('A1');
});

it('web store/update/destroy flow works and enforces policy', function () {
    $user = makeUser();
    $other = makeUser();
    $othersTask = Task::factory()->create(['user_id' => $other->id]);

    $this->actingAs($user);

    // Store
    $resp = $this->post(route('tasks.store'), [
        'title' => 'Controller Created',
        'description' => null,
        'is_completed' => false,
    ]);
    $resp->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp)->assertSee('Controller Created');

    $task = Task::where('user_id', $user->id)->where('title', 'Controller Created')->first();
    expect($task)->not->toBeNull();

    // Update own
    $resp2 = $this->put(route('tasks.update', $task), ['title' => 'Renamed']);
    $resp2->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp2)->assertSee('Renamed');

    // Cannot edit others
    $this->get(route('tasks.edit', $othersTask))->assertForbidden();
    $this->put(route('tasks.update', $othersTask), ['title' => 'X'])->assertForbidden();

    // Delete own
    $resp3 = $this->delete(route('tasks.destroy', $task));
    $resp3->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp3)->assertSee('Task deleted!');
});
