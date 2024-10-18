<?php

use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasContacts(1)
        ->create();
    $this->user2 = User::factory()
        ->hasContacts(1)
        ->create();
});

test('a user can only see its Contacts on the index page', function () {
    actingAs($this->user1);
    $contact1 = $this->user1->contacts()->first();
    $contact2 = $this->user2->contacts()->first();

    $response = $this->get(route('contact.index'));

    $response->assertSee($contact1->name);
    $response->assertStatus(200);

    $response->assertDontSee($contact2->name);
    $response->assertOk();

});

test('a user can only see its Contacts details in the show page', function () {
    actingAs($this->user1);
    $contact1 = $this->user1->contacts()->first();
    $contact2 = $this->user2->contacts()->first();

    $response = $this->get(route('contact.show', $contact1));
    $response->assertOk();

    $response = $this->get(route('contact.show', $contact2));
    $response->assertStatus(403);
});

test('a user can only edit its Contacts', function () {
    actingAs($this->user1);
    $contact1 = $this->user1->contacts()->first();
    $contact2 = $this->user2->contacts()->first();

    $response = $this->get(route('contact.edit', $contact1));
    $response->assertOk();

    $response = $this->get(route('contact.edit', $contact2));
    $response->assertStatus(403);
});

test('a user can only update its Contacts', function () {
    actingAs($this->user1);
    $contact1 = $this->user1->contacts()->first();
    $contact2 = $this->user2->contacts()->first();

    $response = $this->patch(route('contact.update', $contact1), [
        'name' => 'New Name',
        'email' => 'example@gmail.com'
    ]);
    $response->assertRedirect(route('contact.show', $contact1));

    $response = $this->patch(route('contact.update', $contact2), [
        'name' => 'New Name',
        'email' => 'example@gmail.com'
    ]);
    $response->assertStatus(403);
});
