<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaliTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wali', function(Blueprint $table)
		{
			$table->increments('id');
			$table->unsignedInteger('periode_id');
			$table->unsignedInteger('karyawan_id')->index('karyawan_id');
			$table->unsignedInteger('kelas_id')->index('kelas_id');
			$table->enum('stats', array('1','0'));
			$table->timestamps();
			$table->index(['periode_id','karyawan_id','kelas_id'], 'periode_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wali');
	}

}
