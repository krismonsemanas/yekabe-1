<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysToMuridTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->foreign('periode_id','murid_periode_id')->references('id')->on('periode');
            $table->foreign('kelas_id','murid_kelas_id')->references('id')->on('kelas');
            $table->foreign('mapel_id','murid_mapel_id')->references('id')->on('mapel');
            $table->foreign('siswa_id','murid_siswa_id')->references('id')->on('data_murid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('murid', function (Blueprint $table) {
            $table->dropForeign('murid_periode_id');
            $table->dropForeign('murid_kelas_id');
            $table->dropForeign('murid_mapel_id');
            $table->dropForeign('murid_siswa_id');
        });
    }
}
