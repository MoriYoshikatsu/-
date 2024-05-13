<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Appuser;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\users>
 */
class AppuserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this ->faker->realText(10),
            'selfintro' => $this ->faker->realText(100),
            'email' => $this ->faker->email(),
            'password' => $this ->faker->realText(10),
            'created_at' => $this ->faker->date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this ->faker->date('Y-m-d H:i:s', 'now'),
        ];
    }
}
