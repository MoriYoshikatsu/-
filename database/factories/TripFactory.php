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
            'appuser_id' => 1,
            'title' => $this ->faker->realText(10), //トリップリストのタイトル
            'description' => $this ->faker->realText(10), //トリップリストの説明・メモ書き
            'first_point' => $this ->faker->realText(10), //初期ランダムピン地点名
            'first_latitude' => $this ->faker->realText(10), //初期ランダムピン緯度
            'first_longitude' => $this ->faker->realText(10), //初期ランダムピン経度
            'trip_date_at' => $this ->faker->date('Y-m-d H:i:s', 'now'), //旅行した日時
            'trip_time' => $this ->faker->realText(10), //旅行にかかる時間
            'transportation' => $this ->faker->realText(10), //移動手段
            'status' => 0, //公開非公開ステータス
        ];
    }
}
