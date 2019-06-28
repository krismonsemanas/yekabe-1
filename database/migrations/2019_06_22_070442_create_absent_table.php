<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAbsentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('absent', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('periode_id');
			$table->integer('kelas_id');
			$table->integer('mapel_id');
			$table->integer('karyawan_id');
			$table->integer('data_murid_id');
			$table->dateTime('jadwal')->nullable();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->enum('status', array('H','A','I','S'));
			$table->text('keterangan', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('absent');
	}

}
