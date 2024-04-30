<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_penidikan', function (Blueprint $table) {
            $table->string('nomor_ktp')->primary();
            $table->string('nama_instansi');
            $table->integer('id_jurusan');
            $table->string('tahun_masuk');
            $table->string('tahun_lulus');
            $table->string('nilai_ijazah');
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
        Schema::dropIfExists('riwayat_penidikan');
    }
}
