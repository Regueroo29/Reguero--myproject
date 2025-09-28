<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
use App\Models\Job;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create test user
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'email' => 'test@example.com',
        ]);

        // Create 10 employers
        $employers = \App\Models\Employer::factory(10)->create();

        // Create 10 tags
        $tags = \App\Models\Tag::factory(10)->create();

        // Create 20 jobs and assign them to random employers & tags
        \App\Models\Job::factory(20)->create()->each(function ($job) use ($employers, $tags) {
            $job->tags()->attach($tags->random(2));
        });

    }

}
