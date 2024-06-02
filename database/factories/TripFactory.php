<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Trip;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' =>1,
            'parameter_id' => 1,
            'title' => fake()->word,
            'description' => fake()->realText(),
            'trip_date' => fake()-> date(),
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
