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
		Schema::create('parameters', function (Blueprint $table) {
			$table->id();
/*			$table->foreignId('user_id')->constrained('users')->onDelete('cascade');*/
			$table->foreignId('spot_category_id')->constrained('spot_categories')->onDelete('cascade');
			$table->double('departure_latitude')->nullable(); //出発地緯度
			$table->double('departure_longitude')->nullable(); //出発地経度
			$table->integer('trip_time'); //移動できる時間
			$table->string('transportation'); //移動手段
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
		Schema::dropIfExists('parameters');
	}
};
