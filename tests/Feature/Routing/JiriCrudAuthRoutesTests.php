<?php

use App\Models\Jiri;
use App\Models\User;

use function Pest\Laravel\{assertDatabaseHas, assertDatabaseMissing, delete, get, patch, post};

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->otherUser = User::factory()->create();
    $this->actingAs($this->user);
});

// The GET routes
// Index
it('has a route to display their jiris to auth users', function () {
    $this->user->jiris()->save(Jiri::factory()->make());
    $this->otherUser->jiris()->save(Jiri::factory()->make());

    get(route('jiris.index'))
        ->assertStatus(200)
        ->assertSee($this->user->jiris->first()->name)
        ->assertDontSee($this->otherUser->jiris->first()->name);
});

// Show
it('has a route to display one jiri to auth users', function () {
    $jiri = $this->user->jiris()->save(Jiri::factory()->make());

    get(route('jiris.show', $jiri))->assertStatus(200);
});

it('has a route to display a creation form for a jiri to auth users', function () {
    get(route('jiris.create'))->assertStatus(200);
});

it('has a route to display an edit form for a jiri to auth users', function () {
    $jiri = $this->user->jiris()->save(Jiri::factory()->make());

    get(route('jiris.create', $jiri))->assertStatus(200);
});

