<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->integer('kd_pengguna')->primary();
            $table->bigInteger('nomor_ktp');
            $table->string('nama_lengkap', 30);
            $table->integer('tempat_lahir');
            $table->foreign('tempat_lahir')->references('id')->on('cities');
            $table->string('tgl_lahir', 10);
            $table->string('jenis_kelamin');
            $table->longText('alamat_lengkap');
            $table->integer('provinsi');
            $table->foreign('provinsi')->references('id')->on('province');
            $table->integer('kabupaten_kota');
            $table->foreign('kabupaten_kota')->references('id')->on('cities');
            $table->integer('kodepos');
            $table->string('pend_terakhir')->nullable($value = true);
            $table->integer('thn_ijazah')->nullable($value = true);
            $table->string('nomor_kontak', 15)->nullable($value = true);
            $table->string('ukuran_baju', 3)->nullable($value = true);
            $table->integer('ukuran_sepatu')->nullable($value = true);
            $table->string('username');
            $table->string('password');
            $table->string('email', 30);
            $table->string('token')->nullable($value = true);
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
        Schema::dropIfExists('member');
    }
}
