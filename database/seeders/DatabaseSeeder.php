<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(20)->create();
        $this->call(JobSeeder::class);

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
