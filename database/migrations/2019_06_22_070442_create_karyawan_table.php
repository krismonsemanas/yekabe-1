<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKaryawanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('karyawan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('nama', 65535);
			$table->string('nip', 50);
			$table->enum('kelamin', array('LAKI-LAKI','PEREMPUAN'));
			$table->enum('agama', array('BUDDHA','HINDU','ISLAM','KRISTEN KATOLIK','KRISTEN PROTESTAN','KONG HU CU','AGAMA KEPERCAYAAN'));
			$table->string('tempat_lahir');
			$table->date('tanggal_lahir');
			$table->string('email');
			$table->string('phone', 25);
			$table->text('alamat', 65535);
			$table->integer('province_id')->index('province_id');
			$table->integer('city_id')->index('city_id');
			$table->integer('district_id')->index('district_id');
			$table->integer('village_id')->index('village_id');
			$table->integer('kode_pos');
			$table->text('tmt', 65535);
			$table->text('sk_pertama', 65535);
			$table->integer('nuptk');
			$table->integer('nrg');
			$table->text('sertifikat_pendidik', 65535);
			$table->integer('kode_sertifikat_mp');
			$table->text('ijazah_terakhir', 65535);
			$table->integer('nomor_ijazah');
			$table->string('jurusan', 50);
			$table->string('program_studi', 50);
			$table->text('photo', 65535)->nullable();
			$table->unsignedInteger('id_login')->nullable();
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
		Schema::drop('karyawan');
	}

}
