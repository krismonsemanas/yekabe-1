<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToKaryawanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('karyawan', function(Blueprint $table)
		{
			$table->foreign('province_id', 'karyawan_ibfk_1')->references('province_id')->on('location_province')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('district_id', 'karyawan_ibfk_2')->references('district_id')->on('location_district')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('village_id', 'karyawan_ibfk_3')->references('village_id')->on('location_village')->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('city_id', 'karyawan_ibfk_4')->references('city_id')->on('location_city')->onUpdate('RESTRICT')->onDelete('RESTRICT');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('karyawan', function(Blueprint $table)
		{
			$table->dropForeign('karyawan_ibfk_1');
			$table->dropForeign('karyawan_ibfk_2');
			$table->dropForeign('karyawan_ibfk_3');
			$table->dropForeign('karyawan_ibfk_4');
		});
	}

}
