<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSertifikatPendidikanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat_pendidikan', function (Blueprint $table) {
            $table->increments('sertifikatpendidikan_id');
            $table->integer('pencari_kerja_id');
            $table->string('nama_sertifikat');
            $table->string('bidang_keahlian');
            $table->string('nama_institusi');
            $table->date('tgl_terbit');
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
        Schema::dropIfExists('sertifikat_pendidikan');
    }
}
