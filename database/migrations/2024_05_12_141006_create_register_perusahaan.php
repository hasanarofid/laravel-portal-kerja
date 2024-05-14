<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterPerusahaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_perusahaan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('username');
            $table->string('password');
            $table->string('email')->unique();
            $table->string('no_perusahaan');
            $table->string('alamat');
            $table->string('bidang_usaha');
            $table->string('url_perusahaan')->nullable();
            $table->string('keterangan');
            $table->integer('kode_perusahaan');
            $table->integer('role_id');
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
        Schema::dropIfExists('register_perusahaan');
    }
}
