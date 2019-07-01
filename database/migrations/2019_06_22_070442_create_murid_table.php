<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMuridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('murid', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('periode_id');
			$table->unsignedInteger('kelas_id');
			$table->unsignedInteger('mapel_id');
			$table->unsignedInteger('siswa_id');
			$table->tinyInteger('active');
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
		Schema::drop('murid');
	}

}
