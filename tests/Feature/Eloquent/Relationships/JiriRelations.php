<?php

use App\Enums\ContactRole;
use App\Models\User;


test('jiri has many students', function () {
    $user = User::factory()->create();

    $jiri = $user->jiris()->create([
        'name' => 'Jiri name',
        'starting_at' => now(),
    ]);

    $contact = $user->contacts()->create([
            'name' => 'John Doe',
            'email' => 'johndoe@gmail.com',
            'user_id' => $user->id,
    ]);

    $jiri->students()->attach($contact->id, ['role'=> ContactRole::Student->value]);
    $jiri->evaluators()->attach($contact->id, ['role'=> ContactRole::Evaluator->value]);
    expect($jiri->students)->toHaveCount(1);
});
