<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RiwayatPekerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->string('id_riwayatpekerjaan')->primary();
            $table->string('nomor_ktp');
            $table->string('nama_perusahaan');
            $table->string('jabatan');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('gaji');
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
        Schema::dropIfExists('riwayat_pekerjaan');
    }
}
