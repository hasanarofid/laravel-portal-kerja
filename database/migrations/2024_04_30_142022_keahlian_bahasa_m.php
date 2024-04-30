<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KeahlianBahasaM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keahlian_bahasa', function (Blueprint $table) {
            $table->integer('id_keahlianbahasa')->primary();
            $table->string('nomor_ktp');
            $table->string('bahasa');
            $table->string('kemampuan');
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
        Schema::dropIfExists('keahlian_bahasa');
    }
}
