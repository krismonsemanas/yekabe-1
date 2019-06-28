<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataMuridTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_murid', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nisn', 50);
			$table->text('induk_sekolah', 65535)->nullable();
			$table->text('photo', 65535)->nullable();
			$table->string('nama');
			$table->text('tempat_lahir', 65535);
			$table->date('tanggal_lahir');
			$table->enum('kelamin', array('LAKI-LAKI','PEREMPUAN'));
			$table->enum('agama', array('BUDDHA','HINDU','ISLAM','KRISTEN KATOLIK','KRISTEN PROTESTAN','KONG HU CU','AGAMA KEPERCAYAAN'));
			$table->string('phone',25);
			$table->string('email');
			$table->string('ayah');
			$table->string('ibu');
			$table->text('alamat', 65535);
			$table->integer('province_id')->index('provinsi_id');
			$table->integer('city_id')->index('kabupaten_id');
			$table->integer('district_id')->index('kecamatan_id');
			$table->integer('village_id')->index('kelurahan_id');
			$table->integer('kode_pos');
			$table->integer('id_login')->nullable();
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
		Schema::drop('data_murid');
	}

}
