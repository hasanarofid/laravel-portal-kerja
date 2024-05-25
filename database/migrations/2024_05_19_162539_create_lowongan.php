<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLowongan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lowongan', function (Blueprint $table) {
            $table->increments('id_lowongan');
            $table->string('id_perusahaan');
            $table->string('nama_lowongan');
            $table->date('jobfair');
            $table->string('detail_pekerjaan')->nullable();
            $table->boolean('umur_minimal');
            $table->string('umur_maksimal');
            $table->boolean('lajang')->default(false);;
            $table->boolean('pria')->default(false);;
            $table->boolean('wanita')->default(false);;
            $table->string('tk_pria')->nullable();
            $table->string('tk_wanita')->nullable();
            $table->date('batas_tgl_lowongan');
            $table->date('tgl_mulai');
            $table->date('tgl_kadaluarsa');
            $table->string('form_wll');
            $table->string('keterangan');
            $table->string('kualifikasi');
            $table->string('provinsi_id');
            $table->string('kota_id');
            $table->string('keterangan_lowongan');
            $table->string('fasilitas_id');
            $table->string('nama_fasilitas');
            $table->string('keterangan_fasilitas');
            $table->string('bidang_id');
            $table->string('profesi');
            $table->string('keterangan_profesi');
            $table->string('batas_kontrak');
            $table->string('keterangan_kontrak');
            $table->string('pekerjaan_pendidikan');
            $table->string('jurusan');
            $table->string('keterangan_jurusan');
            $table->string('role_id');
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
        Schema::dropIfExists('lowongan');
    }
}
