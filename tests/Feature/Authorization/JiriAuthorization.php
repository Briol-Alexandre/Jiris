<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

beforeEach(function () {
    $this->user1 = User::factory()
        ->hasJiris(1)
        ->create();
    $this->user2 = User::factory()
        ->hasJiris(1)
        ->create();
});

test('a user can only see its Jiris on the index page', function () {
    actingAs($this->user1);
    $jiri1 = $this->user1->jiris()->first();
    $jiri2 = $this->user2->jiris()->first();

    $response = get(route('jiri.index'));

    $response->assertSee($jiri1->name);
    $response->assertDontSee($jiri2->name);
});
