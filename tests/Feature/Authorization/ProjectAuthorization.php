<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasProjects(1)
        ->create();
    $this->user2 = User::factory()
        ->hasProjects(1)
        ->create();
});

test('a user can only see its Projets in the index page', function () {
    actingAs($this->user1);
    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = $this->get(route('project.index'));

    $response->assertSee($project1->name);
    $response->assertDontSee($project2->name);
});

test('a user can only see its Projects details in the show page', function () {
    actingAs($this->user1);
    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = $this->get(route('project.show', $project1));
    $response->assertOk();

    $response = $this->get(route('project.show', $project2));
    $response->assertStatus(403);
});

test('a user can only edit its Projects', function () {
    actingAs($this->user1);
    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = $this->get(route('project.edit', $project1));
    $response->assertOk();

    $response = $this->get(route('project.edit', $project2));
    $response->assertStatus(403);
});

test('a user can only update its Projects', function () {
    actingAs($this->user1);
    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = $this->patch(route('project.update', $project1), [
        'name' => 'New Name',
        'description' => 'New Description'
    ]);
    $response->assertRedirect(route('project.show', $project1));

    $response = $this->patch(route('project.update', $project2), [
        'name' => 'New Name',
        'description' => 'New Description'
    ]);
    $response->assertStatus(403);
});

test('a user can only delete its Projects', function () {
    actingAs($this->user1);
    $project1 = $this->user1->projects()->first();
    $project2 = $this->user2->projects()->first();

    $response = $this->delete(route('project.destroy', $project1));
    $response->assertRedirect(route('project.index'));

    $response = $this->delete(route('project.destroy', $project2));
    $response->assertStatus(403);
});

