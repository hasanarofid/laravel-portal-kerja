<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerusahaanM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan_m', function (Blueprint $table) {
            $table->string('id_perusahaan')->primary();
            $table->string('user_id');
            $table->string('password');
            $table->date('tgl_daftar');
            $table->char('status_akun', 1);
            $table->string('email');
            $table->string('nama_perusahaan');
            $table->string('logo');
            $table->string('jenis_perusahaan');
            $table->integer('id_bidangusaha');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('website');
            $table->string('deskripsi_perusahaan');
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
        Schema::dropIfExists('perusahaan_m');
    }
}
