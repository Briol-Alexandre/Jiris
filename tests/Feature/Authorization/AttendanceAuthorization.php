<?php

use App\Enums\ContactRole;
use App\Models\Attendance;
use App\Models\User;
use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasJiris(1)
        ->hasContacts(1)
        ->create();
    $this->user2 = User::factory()
        ->hasJiris(1)
        ->hasContacts(1)
        ->create();
});
test('an authenticated user cannot update the attendances from another user', function () {
    actingAs($this->user1);

    $jiri1 = $this->user1->jiris()->first();
    $contact1 = $this->user1->contacts()->first();
    $jiri1->contacts()->attach($contact1->id, ['role' => ContactRole::Evaluator->value]);

    $jiri2 = $this->user2->jiris()->first();
    $contact2 = $this->user2->contacts()->first();
    $jiri2->contacts()->attach($contact2->id, ['role' => ContactRole::Evaluator->value]);

    $attendance = Attendance::first();
    $attendance2 = Attendance::where('contact_id', '!=', $contact1->id)->first();

    $response = $this->patch(route('attendances.update', $attendance), [
        'role' => ContactRole::Student->value,
    ]);

    $response->assertStatus(302);

    $response = $this->patch(route('attendances.update', $attendance2), [
        'role' => ContactRole::Student->value,
    ]);

    $response->assertStatus(403);
});
