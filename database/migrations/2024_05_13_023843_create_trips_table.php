<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('appuser_id')->constrained('appusers')->onDelete('cascade');
            $table->string('title'); //トリップリストのタイトル
            $table->string('description'); //トリップリストの説明・メモ書き
            $table->string('first_point'); //初期ランダムピン地点名
            $table->string('first_latitude'); //初期ランダムピン緯度
            $table->string('first_longitude'); //初期ランダムピン経度
            $table->timestamp('trip_date_at')->nullable(); //旅行した日時
            $table->string('trip_time'); //旅行にかかる時間
            $table->string('transportation'); //移動手段
            $table->integer('status'); //公開非公開ステータス
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
};
