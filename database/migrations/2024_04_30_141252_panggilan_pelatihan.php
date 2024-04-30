<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PanggilanPelatihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panggilan_pelatihan', function (Blueprint $table) {
            $table->string('id_panggilan')->primary();
            $table->string('id_pelatihan');
            $table->string('nomor_ktp');
            $table->dateTime('tgl_panggilan');
            $table->dateTime('tgl_jawaban');
            $table->enum('status_panggilan', ['active', 'inactive', 'pending'])->default('active');
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
        Schema::dropIfExists('panggilan_pelatihan');
    }
}
