<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSertifikatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sertifikat', function (Blueprint $table) {
            $table->bigInteger('kd_sertifikat')->primary();
            $table->string('gambar_sertifikat');
            $table->integer('kd_pengguna');
            $table->integer('kd_program');
            $table->string('tgl_terbit', 10);
            $table->string('tgl_kadaluarsa', 10);
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
        Schema::dropIfExists('sertifikat');
    }
}
