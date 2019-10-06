<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkemaPelatihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skema_pelatihan', function (Blueprint $table) {
            $table->integer('kd_skema')->primary();
            $table->integer('kd_program');
            $table->integer('kd_gelombang');
            $table->string('tgl_buka');
            $table->string('tgl_tutup');
            $table->integer('kuota');
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
        Schema::dropIfExists('skema_pelatihan');
    }
}
