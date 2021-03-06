<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKontenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konten', function (Blueprint $table) {
            $table->increments('kd_konten');
            $table->string('judul_konten');
            $table->longText('isi_konten');
            $table->integer('kd_kategori');
            $table->foreign('kd_kategori')->references('kd_kategori_konten')->on('kategori_konten');
            $table->string('foto');
            $table->string('tgl_rilis');
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
        Schema::dropIfExists('konten');
    }
}
