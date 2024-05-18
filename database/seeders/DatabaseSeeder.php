<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Appuser::factory()->count(10)->create();
        \App\Models\Follow::factory()->count(10)->create();
        \App\Models\Trip::factory()->count(10)->create();
        \App\Models\Good::factory()->count(10)->create();
        \App\Models\Image::factory()->count(10)->create();

    }
}
