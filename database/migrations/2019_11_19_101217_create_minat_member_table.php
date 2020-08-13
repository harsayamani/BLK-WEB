<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMinatMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minat_member', function (Blueprint $table) {
            $table->increments('kd_minat_member');
            $table->integer('kd_pengguna');
            $table->foreign('kd_pengguna')->references('kd_pengguna')->on('member');
            $table->unsignedInteger('kd_minat');
            $table->foreign('kd_minat')->references('kd_minat')->on('minat');
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
        Schema::dropIfExists('minat_member');
    }
}
