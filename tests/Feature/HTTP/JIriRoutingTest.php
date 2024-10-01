<?php

use App\Models\Jiri;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\get;
use function Pest\Laravel\post;

beforeEach(function (){
    $this->user = User::factory()->create();
});

it('routes the request to an index of jiris', function () {
    $response = get(route('jiris.index'));

    $response->assertStatus(200);
});

it('routes with model binding the request to a page that shows a specific jiri according to its id',
    function (){
    $jiri = Jiri::factory()->create();
    $response = get(route('jiris.show', compact('jiri')));

    $response->assertStatus(200);
  }
);

it('routes the request to a save in database action when providing data describing the jiri accessible only to an auth user', function(){
    $jiri_data = [
        'name' => 'Projets Web 2025',
        'starting_at' => now()->format('Y-m-d H:i'),
    ];

    $response = post(route('jiris.store'), $jiri_data);

    $response->assertStatus(302);

    assertDatabaseHas('jiris', $jiri_data);
});

it('routes the request to a page that displays a form to create a jiri', function () {
    actingAs($this->user);

    $response = get(route('jiris.create'));
    $response-> assertStatus(200);
});

//faire pour tous les routes mais connecté ou pas ca change
