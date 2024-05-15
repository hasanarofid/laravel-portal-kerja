<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBahasaDikuasaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bahasa_dikuasai', function (Blueprint $table) {
            $table->increments('bahasa_dikuasai_id');
            $table->integer('pencari_kerja_id');
            $table->string('nama_bahasa');
            $table->string('level');
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('bahasa_dikuasai');
    }
}
