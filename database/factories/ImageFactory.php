<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'trip_id' =>1,
            'image_path' => $this ->faker->realText(10),
            'created_at' => $this ->faker-> date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this ->faker-> date('Y-m-d H:i:s', 'now'),
        ];
    }
}
