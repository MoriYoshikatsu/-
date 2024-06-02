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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('parameter_id')->constrained('parameters')->onDelete('cascade');
            $table->string('title'); //トリップリストのタイトル
            $table->string('description')->nullable(); //トリップリストの説明・メモ書き
            $table->date('trip_date')->nullable(); //旅行日
            $table->integer('status'); //公開非公開ステータス
            $table->timestamps();
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
