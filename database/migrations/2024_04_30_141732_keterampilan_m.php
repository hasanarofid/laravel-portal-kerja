<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeterampilanM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keterampilan_m', function (Blueprint $table) {
            $table->integer('id_keterampilan')->primary();
            $table->string('nomor_ktp');
            $table->string('nama_pelatihan');
            $table->string('nama_lembaga');
            $table->string('tahun_lulus');
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
        Schema::dropIfExists('keterampilan_m');
    }
}
