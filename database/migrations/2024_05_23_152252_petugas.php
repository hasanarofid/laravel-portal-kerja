<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Petugas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('petugas_pj', function (Blueprint $table) {
            $table->increments('petugas_id');
            $table->string('id_perusahaan');
            $table->string('nama_petugas');
            $table->string('jabatan');
            $table->string('no_hp');
            $table->string('tahapan_seleksi');
            $table->date('tgl_tahapan_seleksi');
            $table->date('tgl_laporan');
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
        //
    }
}
