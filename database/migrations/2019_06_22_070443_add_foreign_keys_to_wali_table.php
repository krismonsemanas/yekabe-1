<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToWaliTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('wali', function(Blueprint $table)
		{
			$table->foreign('periode_id', 'wali_ibfk_1')->references('id')->on('periode')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('kelas_id', 'wali_ibfk_3')->references('id')->on('kelas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('karyawan_id', 'wali_ibfk_4')->references('id')->on('karyawan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('wali', function(Blueprint $table)
		{
			$table->dropForeign('wali_ibfk_1');
			$table->dropForeign('wali_ibfk_3');
			$table->dropForeign('wali_ibfk_4');
		});
	}

}
