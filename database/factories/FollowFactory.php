<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Follow;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\follow>
 */
class FollowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'follower_id' =>1,
            'followee_id' =>2,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
