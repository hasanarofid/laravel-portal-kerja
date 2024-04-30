<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LowonganKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan_kerja', function (Blueprint $table) {
            $table->string('id_lowongan')->primary();
            $table->string('id_perusahaan');
            $table->string('lowongan');
            $table->string('deskripsi_pekerjaan');
            $table->Date('tgl_buka');
            $table->Date('tgl_tutup');
            $table->integer('id_jurusan');
            $table->string('kualifikasi');
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
        Schema::dropIfExists('lowongan_kerja');
    }
}
