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


