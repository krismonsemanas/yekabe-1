<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLokasiAbsentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lokasi_absent', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('lat', 65535);
			$table->text('lng', 65535);
			$table->integer('toleransi');
			$table->boolean('stat')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lokasi_absent');
	}

}
