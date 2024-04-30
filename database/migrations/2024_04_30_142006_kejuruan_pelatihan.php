<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KejuruanPelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kejuruan_pelatihan', function (Blueprint $table) {
            $table->string('id_pelatihan')->primary();
            $table->integer('id_program');
            $table->string('kejuruan');
            $table->date('mulai_pendaftaran');
            $table->date('akhir_pendaftaran');
            $table->date('tgl_verifikasi');
            $table->date('mulai_pelatihan');
            $table->date('akhir_pelatihan');
            $table->integer('kuota');
            $table->integer('usia_minimal');
            $table->integer('usia_maksimal');
            $table->string('tingkat_pendidikan');
            $table->string('syarat_lengkap');
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
        Schema::dropIfExists('kejuruan_pelatihan');
    }
}
