<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPencaker extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_pencaker', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('username');

            $table->string('email')->unique();

            $table->string('password');

            $table->string('nik');

            $table->string('no_tlp');

            $table->string('alamat');

            $table->integer('role_id');

            $table->string('gender')->nullable();

            $table->string('foto')->nullable();

            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
