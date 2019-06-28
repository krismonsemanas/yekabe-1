<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToGuruTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('guru', function(Blueprint $table)
		{
			$table->foreign('periode_id', 'guru_ibfk_1')->references('id')->on('periode')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('kelas_id', 'guru_ibfk_2')->references('id')->on('kelas')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('mapel_id', 'guru_ibfk_3')->references('id')->on('mapel')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('karyawan_id', 'guru_ibfk_4')->references('id')->on('karyawan')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('guru', function(Blueprint $table)
		{
			$table->dropForeign('guru_ibfk_1');
			$table->dropForeign('guru_ibfk_2');
			$table->dropForeign('guru_ibfk_3');
			$table->dropForeign('guru_ibfk_4');
		});
	}

}
