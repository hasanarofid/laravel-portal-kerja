<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KepalaBidangKetenagakerjaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kepala_bidang_ketenagakerjaan', function (Blueprint $table) {
            $table->integer('id_kepalabidang')->primary();
            $table->string('nip');
            $table->string('emai');
            $table->string('password');
            $table->string('nama');
            $table->date('tmt');
            $table->string('foto');
            $table->char('status', 1);
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
        Schema::dropIfExists('kepala_bidang_ketenagakerjaan');

    }
}
