<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->increments('riwayatpendidikan_id');
            $table->integer('pencari_kerja_id');
            $table->string('nama_pendidikan');
            $table->string('nama_jurusan');
            $table->string('nama_institusi');
            $table->string('kota');
            $table->string('thn_masuk');
            $table->string('thn_keluar');
            $table->string('ipk_denim');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('riwayat_pendidikan');
    }
}
