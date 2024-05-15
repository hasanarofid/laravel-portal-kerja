<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengalamanKerjaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengalaman_kerja', function (Blueprint $table) {
            $table->increments('pengalaman_kerja_id');
            $table->integer('pencari_kerja_id');
            $table->string('nama_perusahaan');
            $table->string('bidang');
            $table->string('profesi');
            $table->string('posisi');
            $table->date('tgl_masuk');
            $table->date('tgl_selesai');
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
        Schema::dropIfExists('pengalaman_kerja');
    }
}
