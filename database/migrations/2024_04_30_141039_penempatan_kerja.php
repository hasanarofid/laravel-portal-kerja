<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PenempatanKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penempatan_kerja', function (Blueprint $table) {
            $table->string('id_penempatan')->primary();
            $table->string('nomor_ktp');
            $table->string('id_perusahaan');
            $table->string('jabatan');
            $table->date('tgl_penempatan');
            $table->string('lokasi_penempatan');
            $table->enum('status', ['active', 'inactive', 'pending'])->default('active');
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
        Schema::dropIfExists('penempatan_kerja');
    }
}
