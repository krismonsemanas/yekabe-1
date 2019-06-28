<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePengumumanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengumuman', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('judul', 65535);
			$table->text('isi', 65535);
			$table->enum('status', array('0','1'));
			$table->date('sampai');
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
		Schema::drop('pengumuman');
	}

}
