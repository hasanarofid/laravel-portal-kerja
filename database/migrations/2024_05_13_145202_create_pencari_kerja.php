<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencariKerja extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencari_kerja', function (Blueprint $table) {
            $table->increments('pencari_kerja_id');
            $table->integer('users_pencaker_id');
            $table->string('nomor_ktp')->nullable();
            $table->string('password')->nullable();
            $table->string('email')->nullable();
            $table->date('tgl_daftar')->nullable();
            $table->string('nama');
            $table->string('foto')->nullable();
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('gender');
            $table->string('agama');
            $table->string('status_kawin');
            $table->string('kewarganegaraan');
            $table->integer('tinggi_badan');
            $table->integer('berat_badan');
            $table->string('no_hp')->nullable();
            $table->string('telepon')->nullable();
            $table->string('id_sekolah')->nullable();
            $table->string('alamat');
            $table->string('provinsi_nama');
            $table->string('kota_nama');
            $table->string('kecamatan_nama');
            $table->string('kelurahan_nama');
            $table->string('rw');
            $table->string('rt');
            $table->string('jml_anak');
            $table->string('tentang_saya');
            $table->string('link_video');
            $table->string('keterangan')->nullable();
            $table->string('gaji_harapan')->nullable();
            $table->string('harapan_lokasipekerjaan')->nullable();
            $table->enum('status_akun', ['active', 'inactive', 'pending'])->default('active');
            $table->enum('status_pencaker', ['active', 'inactive', 'pending'])->default('active');
            $table->string('token_id')->nullable();
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
