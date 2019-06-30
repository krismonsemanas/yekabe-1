<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNilaiTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('nilai', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('periode_id');
			$table->integer('kelas_id');
			$table->integer('mapel_id');
			$table->integer('karyawan_id');
			$table->integer('data_murid_id');
			$table->integer('nilai');
			$table->unsignedInteger('bobot_id');
			$table->foreign('bobot_id')->reference('id')->on('bobot');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('nilai');
	}

}
