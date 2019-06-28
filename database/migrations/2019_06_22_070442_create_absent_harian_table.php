<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsentHarianTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absent_harian', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('data_murid_id');
			$table->text('lat_absent', 65535);
			$table->text('lng_absent', 65535);
			$table->timestamp('datetime_absent')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->text('lat_zero', 65535);
			$table->text('lng_zero', 65535);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('absent_harian');
	}

}
