<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLoginForeignKeysToKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('karyawan', function (Blueprint $table) {
			$table->foreign('id_login', 'karyawan_ibfk_5')->references('id')->on('login_app')->onUpdate('RESTRICT')->onDelete('RESTRICT');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('karyawan', function (Blueprint $table) {
            $table->dropForeign('karyawan_ibfk_5');
        });
    }
}
