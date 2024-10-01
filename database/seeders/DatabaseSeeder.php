<?php

namespace Database\Seeders;

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
        User::factory(10)
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Project::factory()->count(8), 'projects')
            ->has(Contact::factory()->count(4), 'contacts')
            ->create();

        User::factory()
            ->has(Jiri::factory()->count(5), 'jiris')
            ->has(Project::factory()->count(8), 'projects')
            ->has(Contact::factory()->count(4), 'contacts')
            ->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => '1234567890',
            ]);

        $this->call(
            [
                //JiriSeeder::class,
                //ProjectSeeder::class,
                //ContactSeeder::class,
            ]
        );
    }
}
