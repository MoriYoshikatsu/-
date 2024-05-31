<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Parameter;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\parameter>
 */
class ParameterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'spot_category_id' =>2,
            'departure_latitude' => fake() ->randomFloat(2, 30, 40), //出発地緯度
            'departure_longitude' => fake() ->randomFloat(2, 130, 140), //出発地経度
            'trip_time' => fake() ->randomNumber, //移動にかかる時間
            'transportation' => fake() -> word, //移動手段
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
