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
            'follower_id' => $this ->1,
            'followee_id' => $this ->2,
            'created_at' => $this ->faker-> date('Y-m-d H:i:s', 'now'),
            'updated_at' => $this ->faker-> date('Y-m-d H:i:s', 'now'),
        ];
    }
}
