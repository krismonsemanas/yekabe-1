<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoginAppTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('login_app', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('username', 65535);
			$table->text('password', 65535);
			$table->string('remember_token', 100)->nullable();
			$table->dateTime('email_verified_at')->nullable();
			$table->enum('level', array('MURID','ORANG TUA','GURU','ADMIN'));
			$table->timestamp('datetime_created')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->dateTime('last_login')->nullable();
			$table->enum('status', array('PENDING','ACTIVE','BLOCKED',''))->default('ACTIVE');
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
		Schema::drop('login_app');
	}

}
