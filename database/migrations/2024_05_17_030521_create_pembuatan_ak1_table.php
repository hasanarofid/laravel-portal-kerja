<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembuatanAk1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembuatan_ak1', function (Blueprint $table) {
            $table->increments('pembuatan_ak1_id');
            $table->integer('pencari_kerja_id');
            $table->string('name');
            $table->string('nik');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('tmpt_lahir');
            $table->date('tgl_lahir');
            $table->string('jeniskelamin');
            $table->string('pendidikan_terakhir');
            $table->string('alamat');
            $table->string('pasfoto');
            $table->string('ktp');
            $table->string('ijazah');
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
        Schema::dropIfExists('pembuatan_ak1');
    }
}
