<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeriodeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('periode', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('tahun_ajaran', 12);
			$table->enum('semester', array('GANJIL','GENAP'));
			$table->enum('stats', array('1','0'));
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
		Schema::drop('periode');
	}

}
