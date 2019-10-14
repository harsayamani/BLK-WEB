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

Route::get('/admin/login', 'AdminController@login_index');

Route::post('/admin/login/proses', 'AdminController@login_post');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/dataMember/akunMember', 'MemberController@akun_member');

Route::get('/admin/dataMember/kabupatenKota/{id}', 'MemberController@dynamic_select');

Route::get('/ajax-kota/{id}', 'MemberController@ajax');