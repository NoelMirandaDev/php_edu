<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(300)->create();

        User::inRandomOrder()->limit(20)->get()->each(function ($user) {
            Employer::factory()->create([
                'user_id' => $user->id,
            ]);
        });

        Job::factory(100)
            ->state(fn() => [
                'employer_id' => Employer::inRandomOrder()->value('id'),
            ])
            ->create();
    }
}
