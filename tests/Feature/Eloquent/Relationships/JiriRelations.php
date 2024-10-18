<?php

use App\Enums\ContactRole;
use App\Models\Attendance;
use App\Models\Jiri;
use App\Models\User;

test('jiri has many students', function () {
    $user = User::factory()->create();

    $jiri = $user->jiris()->create([
        'name' => 'Jiri name',
        'starting_at' => now(),
    ]);

    $contacts = $user->contacts()->create([
        'name' => 'Contact 1',
        'email' => 'email@example.be',
        'user_id' => $user->id,
    ]);

    $jiri->students()->attach($contacts->id, ['role' => ContactRole::Student->value]);
    $jiri->evaluator()->attach($contacts->id, ['role' => ContactRole::Evaluator->value]);

    expect($jiri->students)->toHaveCount(1)
        ->and($jiri->contacts)->toHaveCount(2);
});
