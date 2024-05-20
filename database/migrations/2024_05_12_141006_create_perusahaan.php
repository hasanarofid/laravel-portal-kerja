<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->increments('id_perusahaan');
            $table->string('user_id')->nullable();
            $table->string('username');
            $table->string('password');
            $table->date('tgl_daftar')->nullable();
            $table->boolean('status_akun')->default(0);
            $table->string('email')->unique();
            $table->string('nama_perusahaan');
            $table->string('logo')->nullable();
            $table->string('jenis_perusahaan')->nullable();
            $table->string('id_bidangusaha');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('website');
            $table->string('deskripsi_perusahaan');
            $table->integer('role_id');
            $table->integer('kode_perusahaan');
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('perusahaan');
    }
}
