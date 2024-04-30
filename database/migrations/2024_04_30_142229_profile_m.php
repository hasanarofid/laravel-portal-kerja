<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProfileM extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_m', function (Blueprint $table) {
            $table->integer('id_profile')->primary();
            $table->string('alamat_kantor');
            $table->string('kode_pos');
            $table->string('telepon');
            $table->string('email');
            $table->string('deskripsi');
            $table->string('foto_kantor');
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
        Schema::dropIfExists('profile_m');

    }
}
