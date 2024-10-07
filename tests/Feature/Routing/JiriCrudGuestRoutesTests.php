<?php

use App\Models\Jiri;

use App\Models\User;

use function Pest\Laravel\delete;
use function Pest\Laravel\get;
use function Pest\Laravel\patch;
use function Pest\Laravel\post;

it('redirects to login an unauthenticated user attempting to access jiris.index', function () {
    get(route('jiris.index'))->assertRedirectToRoute('login');
});

it('redirects to login an unauthenticated user attempting to access jiris.show', function () {
    $user = User::factory()->create();
    $user->jiris()->save(Jiri::factory()->make());
    $jiri = $user->jiris()->first();

    get(route('jiris.show', compact('jiri')))->assertRedirectToRoute('login');
});

it('redirects to login an unauthenticated user attempting to access jiris.create', function () {
    get(route('jiris.create'))->assertRedirectToRoute('login');
});

it('redirects to login an unauthenticated user attempting to access jiris.edit', function () {
    $user = User::factory()->create();
    $user->jiris()->save(Jiri::factory()->make());
    $jiri = $user->jiris()->first();

    get(route('jiris.edit', compact('jiri')))->assertRedirectToRoute('login');
});


