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
            $table->integer('nomor_ktp');
            $table->string('nama_lengkap', 30);
            $table->string('tempat_lahir');
            $table->string('tgl_lahir');
            $table->string('jenis_kelamin');
            $table->string('pend_terakhir');
            $table->integer('thn_ijazah');
            $table->longText('alamat_lengkap');
            $table->string('provinsi');
            $table->string('kabupaten_kota');
            $table->string('desa_kelurahan');
            $table->string('rt', 2);
            $table->string('rw', 2);
            $table->integer('kodepos');
            $table->string('nomor_kontak', 15);
            $table->string('ukuran_baju', 3);
            $table->integer('ukuran_sepatu');
            $table->string('username');
            $table->string('password');
            $table->string('email', 30);
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
