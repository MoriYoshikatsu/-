<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
 */
class GoodFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'appuser_id' => 2,
            'trip_id' => 3,
            'status' => 0,
            'created_at' => $this ->faker->date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this ->faker->date('Y-m-d H:i:s', 'now'),
        ];
    }
}
