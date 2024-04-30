<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PencariKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencari_kerja', function (Blueprint $table) {
            $table->string('nomor_ktp')->primary();
            $table->string('password');
            $table->string('email');
            $table->date('tgl_daftar');
            $table->string('nama');
            $table->string('foto');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('status_kawin');
            $table->string('kewarganegaraan');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('no_hp');
            $table->string('telepon');
            $table->string('id_sekolah');
            $table->string('alamat');
            $table->string('gaji_harapan');
            $table->string('harapan_lokasipekerjaan');
            $table->enum('status_akun', ['active', 'inactive', 'pending'])->default('active');
            $table->enum('status_pencaker', ['active', 'inactive', 'pending'])->default('active');
            $table->string('token_id');
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
        Schema::dropIfExists('pencari_kerja');
    }
}
