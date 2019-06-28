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
			$table->integer('periode_id');
			$table->integer('kelas_id');
			$table->integer('mapel_id');
			$table->integer('siswa_id');
			$table->integer('active');
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
