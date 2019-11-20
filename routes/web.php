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

//Route Admin

Route::get('/admin/login', 'AdminController@login_index');

Route::post('/admin/login/proses', 'AdminController@login_post');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/gantiPassword', 'AdminController@ganti_password_index');

Route::post('/admin/gantiPasswordPost', 'AdminController@ganti_password_post');

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




