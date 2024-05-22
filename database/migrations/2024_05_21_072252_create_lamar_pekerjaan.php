<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamarPekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamar_pekerjaan', function (Blueprint $table) {
            $table->increments('lamar_pekerjaan_id');
            $table->integer('pencari_kerja_id');
            $table->integer('lowongan_id');
            $table->string('lampiran_kualifikasi');
            $table->integer('status');
            $table->date('tgl_interview')->nullable();
            $table->string('alasan_ditolak')->nullable();
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
        Schema::dropIfExists('lamar_pekerjaan');
    }
}
