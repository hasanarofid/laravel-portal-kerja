<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PanggilanInterview extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('panggilan_interview', function (Blueprint $table) {
            $table->string('id_panggilan')->primary();
            $table->string('id_lowongan');
            $table->dateTime('tgl_panggilan');
            $table->dateTime('tgl_interview');
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
        Schema::dropIfExists('panggilan_interview');
    }
}
