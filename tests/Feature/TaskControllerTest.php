<?php

use App\Models\Task;
use App\Models\User;

function makeUser(string $role = 'user'): User
{
    return User::factory()->create(['role' => $role]);
}

it('redirects guests to login for web task routes', function () {
    $this->get('/tasks')->assertRedirect('/login');
    $this->get('/tasks/create')->assertRedirect('/login');
    $this->post('/tasks', [])->assertRedirect('/login');
});

it('user sees only their own tasks on index', function () {
    $user = makeUser();
    $other = makeUser();
    $ownTask = Task::factory()->for($user)->create(['title' => 'Own Task']);
    $otherTask = Task::factory()->for($other)->create(['title' => 'Other Task']);

    $this->actingAs($user);
    $res = $this->get('/tasks')->assertOk();
    $res->assertSee('Own Task');
    $res->assertDontSee('Other Task');
});

it('admin sees all tasks on index', function () {
    $admin = makeUser('admin');
    $u1 = makeUser();
    $t1 = Task::factory()->for($u1)->create(['title' => 'U1 Task']);

    $this->actingAs($admin);
    $this->get('/tasks')->assertOk()->assertSee('U1 Task');
});

it('user can view create form and store a task', function () {
    $user = makeUser();
    $this->actingAs($user);

    $this->get('/tasks/create')->assertOk()->assertSee('Create Task');

    $resp = $this->post('/tasks', [
        'title' => 'Web Created',
        'description' => 'Via web',
        'is_completed' => '1',
    ]);

    $resp->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp)->assertSee('Task created!')->assertSee('Web Created');
});

it('validates web create request', function () {
    $user = makeUser();
    $this->actingAs($user);

    $resp = $this->from(route('tasks.create'))->post('/tasks', []);
    $resp->assertRedirect(route('tasks.create'));
    $resp->assertSessionHasErrors(['title']);
});

it('user can edit and update own task; cannot edit others', function () {
    $user = makeUser();
    $other = makeUser();
    $own = Task::factory()->for($user)->create(['title' => 'Edit Me']);
    $others = Task::factory()->for($other)->create();

    $this->actingAs($user);

    // Edit form own
    $this->get(route('tasks.edit', $own))->assertOk()->assertSee('Edit Task');

    // Update own
    $resp = $this->put(route('tasks.update', $own), ['title' => 'Updated Title']);
    $resp->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp)->assertSee('Task updated!')->assertSee('Updated Title');

    // Cannot edit others
    $this->get(route('tasks.edit', $others))->assertForbidden();
    $this->put(route('tasks.update', $others), ['title' => 'X'])->assertForbidden();
});

it('user can delete own task; cannot delete others', function () {
    $user = makeUser();
    $other = makeUser();
    $own = Task::factory()->for($user)->create(['title' => 'Delete Me']);
    $others = Task::factory()->for($other)->create();

    $this->actingAs($user);

    $resp = $this->delete(route('tasks.destroy', $own));
    $resp->assertRedirect(route('tasks.index'));
    $this->followRedirects($resp)->assertSee('Task deleted!');

    $this->delete(route('tasks.destroy', $others))->assertForbidden();
});
