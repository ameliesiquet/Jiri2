<?php

namespace Database\Seeders;

use App\Enums\ContactRole;
use App\Models\Contact;
use App\Models\Jiri;
use App\Models\Project;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)
            ->has(
                Jiri::factory()
                    ->count(5)
                    ->hasAttached(
                        Contact::factory()
                            ->count(10)
                            ->state(function (array $attributes, Jiri $jiri){
                                return ['user_id' => $jiri->user_id];
                            }),
                        fn()=>['role'=> random_int(0,1) ?
                            ContactRole::Evaluator->value :
                            ContactRole::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(5)
                            ->state(function (array $attributes, Jiri $jiri){
                                return ['user_id' => $jiri->user_id];
                            }),
                    )
            )

            ->create();

        User::factory(3)
            ->has(
                Jiri::factory()
                    ->count(5)
                    ->hasAttached(
                        Contact::factory()
                            ->count(10)
                            ->state(function (array $attributes, Jiri $jiri){
                                return ['user_id' => $jiri->user_id];
                            }),
                        fn()=>['role'=> random_int(0,1) ?
                            ContactRole::Evaluator->value :
                            ContactRole::Student->value
                        ]
                    )
                    ->hasAttached(
                        Project::factory()
                            ->count(5)
                            ->state(function (array $attributes, Jiri $jiri){
                                return ['user_id' => $jiri->user_id];
                            }),
                    )
            )
            ->create(['name'=>'Amélie Siquet', 'email'=>'test@example.com', 'password' => '1234567890']);
    }
}
