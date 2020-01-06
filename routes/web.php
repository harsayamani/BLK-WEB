<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//LEVEL USER ADMIN

//Route Admin

use Illuminate\Support\Facades\Route;

Route::get('/admin', 'AdminController@index');

Route::get('/admin/login', 'AdminController@login_index');

Route::post('/admin/login/proses', 'AdminController@login_post');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/gantiPassword', 'AdminController@ganti_password_index');

Route::post('/admin/gantiPasswordPost', 'AdminController@ganti_password_post');

Route::get('/admin/kelolaPesan', 'AdminController@kelola_pesan');

Route::post('/admin/kelolaPesan/kirim', 'AdminController@kirim_pesan');

Route::post('/admin/kelolaPesan/kirimNomor', 'AdminController@kirim_pesan_nomor');

//Route Member

Route::get('/admin/dataMember/akunMember', 'MemberController@akun_member');

Route::get('/admin/dataMember/kabupatenKota/{id}', 'MemberController@dynamic_select');

Route::get('/ajax-kota/{id}', 'MemberController@ajax');

Route::post('/ajax-kodepos', 'MemberController@ajax2');

Route::post('/admin/dataMember/akunMember/tambahAkun', 'MemberController@tambah_akun_member');

Route::post('/admin/dataMember/akunMember/ubahAkun', 'MemberController@ubah_akun_member');

Route::get('/admin/dataMember/akunMember/hapusAkun/{kd_pengguna}', 'MemberController@hapus_akun_member');

//Route Sertifikat

Route::get('/admin/dataMember/sertifikat', 'MemberController@sertifikat');

Route::post('/admin/dataMember/sertifikat/tambahSertifikat', 'MemberController@tambah_sertifikat');

Route::post('/admin/dataMember/sertifikat/ubahSertifikat', 'MemberController@ubah_sertifikat');

Route::get('/admin/dataMember/sertifikat/hapusSertifikat/{kd_sertifikat}', 'MemberController@hapus_sertifikat');

Route::get('/admin/dataMember/sertifikat/lembarPengesahan/{kd_sertifikat}', 'MemberController@lembar_pengesahan');

Route::get('/ajax-program/{kd_pengguna}', 'MemberController@program');


//Route Kategori Konten

Route::get('/admin/dataKonten/kategoriKonten', 'KontenWebController@kategori_konten');

Route::post('/admin/dataKonten/kategoriKonten/tambahKategoriKonten', 'KontenWebController@tambah_kategori_konten');

Route::post('/admin/dataKonten/kategoriKonten/ubahKategoriKonten', 'KontenWebController@ubah_kategori_konten');

Route::get('/admin/dataKonten/kategoriKonten/hapusKategoriKonten/{kd_kategori_konten}', 'KontenWebController@hapus_kategori_konten');

//Route Konten

Route::get('/admin/dataKonten/konten', 'KontenWebController@konten');

Route::post('/admin/dataKonten/konten/tambahKonten', 'KontenWebController@tambah_konten');

Route::post('/admin/dataKonten/konten/ubahKonten', 'KontenWebController@ubah_konten');

Route::get('/admin/dataKonten/konten/hapusKonten/{kd_konten}', 'KontenWebController@hapus_konten');

//Route Loker

Route::get('/admin/dataKonten/loker', 'KontenWebController@loker');

Route::post('/admin/dataKonten/loker/tambahLoker', 'KontenWebController@tambah_loker');

Route::post('/admin/dataKonten/loker/ubahLoker', 'KontenWebController@ubah_loker');

Route::get('/admin/dataKonten/loker/hapusLoker/{kd_loker}', 'KontenWebController@hapus_loker');

//Route Link

Route::get('/admin/dataKonten/link', 'KontenWebController@link_dinas');

Route::post('/admin/dataKonten/link/tambahLink', 'KontenWebController@tambah_link_dinas');

Route::post('/admin/dataKonten/link/ubahLink', 'KontenWebController@ubah_link_dinas');

Route::get('/admin/dataKonten/link/hapusLink/{kd_link}', 'KontenWebController@hapus_link_dinas');

//Route Profil

Route::get('/admin/dataKonten/profil', 'KontenWebController@profil');

Route::post('/admin/dataKonten/profil/tambahProfil', 'KontenWebController@tambah_profil');

Route::post('/admin/dataKonten/profil/ubahProfil', 'KontenWebController@ubah_profil');

Route::get('/admin/dataKonten/profil/hapusProfil/{kd_profil}', 'KontenWebController@hapus_profil');

//Route Galeri

Route::get('/admin/dataKonten/galeri', 'KontenWebController@galeri');

Route::post('/admin/dataKonten/galeri/tambahGaleri', 'KontenWebController@tambah_galeri');

Route::get('/admin/dataKonten/galeri/hapusGaleri/{kd_galeri}/{url_galeri}', 'KontenWebController@hapus_galeri');

//Route Gelombang

Route::get('/admin/dataPelatihan/gelombang', 'PelatihanController@gelombang');

Route::post('/admin/dataPelatihan/gelombang/tambahGelombang', 'PelatihanController@tambah_gelombang');

Route::post('/admin/dataPelatihan/gelombang/ubahGelombang', 'PelatihanController@ubah_gelombang');

Route::get('/admin/dataPelatihan/gelombang/hapusGelombang/{kd_gelombang}', 'PelatihanController@hapus_gelombang');

//Route Program Pelatihan

Route::get('/admin/dataPelatihan/program', 'PelatihanController@program');

Route::post('/admin/dataPelatihan/program/tambahProgram', 'PelatihanController@tambah_program');

Route::post('/admin/dataPelatihan/program/ubahProgram', 'PelatihanController@ubah_program');

Route::get('/admin/dataPelatihan/program/hapusProgram/{kd_program}', 'PelatihanController@hapus_program');

//Route Skema Pelatihan

Route::get('/admin/dataPelatihan/skema', 'PelatihanController@skema');

Route::post('/admin/dataPelatihan/skema/tambahSkema', 'PelatihanController@tambah_skema');

Route::post('/admin/dataPelatihan/skema/ubahSkema', 'PelatihanController@ubah_skema');

Route::get('/admin/dataPelatihan/skema/hapusSkema/{kd_skema}', 'PelatihanController@hapus_skema');

//Route Pendaftaran Pelatihan

Route::get('/admin/dataPelatihan/pendaftaran', 'PelatihanController@pendaftaran');

Route::post('/admin/dataPelatihan/pendaftaran/tambahPendaftaran', 'PelatihanController@tambah_pendaftaran');

Route::post('/admin/dataPelatihan/pendaftaran/ubahPendaftaran', 'PelatihanController@ubah_pendaftaran');

Route::get('/admin/dataPelatihan/pendaftaran/hapusPendaftaran/{kd_pendaftaran}', 'PelatihanController@hapus_pendaftaran');

Route::get('/admin/dataPelatihan/pendaftaran/tidakLulus/{kd_pendaftaran}', 'PelatihanController@konfirmasi_tidak_lulus');

Route::get('admin/dataPelatihan/exportExcel', 'PelatihanController@export_excel');

//LEVEL USER MEMBER

Route::get('/login', 'MemberSideController@login_index');

Route::post('/login/proses', 'MemberSideController@login_proses');

Route::get('/logout', 'MemberSideController@logout');

Route::get('/member/dashboard', 'MemberSideController@dashboard');

Route::get('/daftarAkun', 'MemberSideController@daftar_akun');

Route::post('/daftarAkun/proses', 'MemberSideController@daftar_proses');

Route::get('/lupaPassword', 'MemberSideController@lupa_password');

Route::post('/lupaPassword/proses', 'MemberSideController@lupa_password_proses');

Route::get('/gantiPassword/{kd_pengguna}', 'MemberSideController@ganti_password');

Route::post('/gantiPassword/proses/{kd_pengguna}', 'MemberSideController@ganti_password_proses');

Route::get('/member/akun', 'MemberSideController@akun');

Route::post('/member/akun/ubah', 'MemberSideController@ubah_akun');

Route::get('/member/sertifikat', 'MemberSideController@sertifikat');

Route::get('/member/jadwalPelatihan', 'MemberSideController@jadwal_pelatihan');

Route::post('/member/jadwalPelatihan/filter', 'MemberSideController@filter_jadwal');

Route::get('/member/pendaftaranPelatihan', 'MemberSideController@pendaftaran_pelatihan');

Route::post('/member/pendaftaranPelatihan/daftar', 'MemberSideController@daftar_pelatihan');

//LEVEL USER PUBLIK

Route::get('/', 'PublicController@index');

Route::get('/konten/{kd_konten}', 'PublicController@detail_konten');

Route::get('/loker', 'PublicController@loker');

Route::get('/loker/{kd_loker}', 'PublicController@detail_loker');

Route::get('/galeri', 'PublicController@galeri');

Route::get('/profilLembaga', 'PublicController@profil');

Route::get('/kontenKategori/{kd_kategori_konten}', 'PublicController@konten_kategori');

Route::get('/programPelatihan', 'PublicController@program_pelatihan');

Route::get('/programPelatihan/{kd_program}', 'PublicController@detail_program_pelatihan');

Route::get('/jadwalPelatihan', 'PublicController@jadwal_pelatihan');

Route::get('/jadwalPelatihan/{kd_gelombang}', 'PublicController@jadwal_pelatihan');

Route::post('/jadwalPelatihan/filter', 'PublicController@filter_jadwal');

Route::get('/validasiSertifikat', 'PublicController@validasi_sertifikat');

Route::post('/validasiSertifikat/cari', 'PublicController@cari_sertifikat');

Route::get('/alurPelatihan', 'PublicController@alur_pelatihan');