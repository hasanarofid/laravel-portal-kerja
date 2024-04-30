<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SekolahM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sekolah_m', function (Blueprint $table) {
            $table->string('id_sekolah')->primary();
            $table->string('nama_sekolah');
            $table->string('alamat_sekolah');
            $table->string('nama_siswa');
            $table->string('jurusan');
            $table->integer('tahun_lulus');
            $table->integer('nilai_ijazah');
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
        Schema::dropIfExists('sekolah_m');
    }
}
