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
        User::factory(1)
            ->hasJiris(2)
            ->hasProjects(2)
            ->hasContacts(2)
            ->create()
            ->each(function ($user){
                $user->jiris->each(function ($jiri) use ($user){
                    $jiri->contacts()->attach(
                        $user->contacts->random(2),
                        ['role'=> random_int(0,1) ?
                        ContactRole::Evaluator->value :
                        ContactRole::Student->value]
                    );
                });
            });

        User::factory(1)
            ->hasJiris(2)
            ->hasProjects(2)
            ->hasContacts(2)
            ->create(['name'=>'Amélie Siquet', 'email'=>'test@example.com', 'password' => '1234567890'])
            ->each(function ($user){
                $user->jiris->each(function ($jiri) use ($user){
                    $jiri->evaluators()->attach(
                        $user->contacts->random(2)
                    );
                });
            });
    }
}
