<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelatihanPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelatihan_pendidikan', function (Blueprint $table) {
            $table->increments('pelatihanpendidikan_id');
            $table->integer('pencari_kerja_id');
            $table->string('nama_pelatihan');
            $table->string('penyelenggara');
            $table->string('tgl_terbit');
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
        Schema::dropIfExists('pelatihan_pendidikan');
    }
}
