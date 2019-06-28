<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGuruTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('guru', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('periode_id')->index('periode_id');
			$table->unsignedInteger('kelas_id')->index('kelas_id');
			$table->unsignedInteger('mapel_id')->index('mapel_id');
			$table->unsignedInteger('karyawan_id')->index('karyawan_id');
			$table->enum('active', array('1','0'));
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
		Schema::drop('guru');
	}

}
