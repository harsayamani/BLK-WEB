<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendaftaranProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendaftaran_program', function (Blueprint $table) {
            $table->integer('kd_pendaftaran')->primary();
            $table->integer('kd_pengguna');
            $table->foreign('kd_pengguna')->references('kd_pengguna')->on('member');
            $table->integer('kd_skema');
            $table->foreign('kd_skema')->references('kd_skema')->on('skema_pelatihan');
            $table->integer('status');
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
        Schema::dropIfExists('pendaftaran_program');
    }
}
