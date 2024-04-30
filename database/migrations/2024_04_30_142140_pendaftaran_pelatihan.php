<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PendaftaranPelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_pelatihan', function (Blueprint $table) {
            $table->string('id_pendaftaran')->primary();
            $table->string('nomor_ktp');
            $table->string('id_pelatihan');
            $table->date('tgl_daftar');
            $table->date('tgl_jawaban');
            $table->enum('status_pendaftaran', ['active', 'inactive', 'pending'])->default('active');
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
        Schema::dropIfExists('pendaftaran_pelatihan');
    }
}
