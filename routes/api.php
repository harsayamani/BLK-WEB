<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('getDetailInfo', 'Mobile\InfoController@getDetailInfo');
Route::get('getBerita', 'Mobile\InfoController@getBerita');
Route::get('getPengumuman', 'Mobile\InfoController@getPengumuman');
Route::get('getLoker', 'Mobile\InfoController@getLoker');
Route::get('getSemuaBerita', 'Mobile\InfoController@getSemuaBerita');
Route::get('getSemuaPengumuman', 'Mobile\InfoController@getSemuaPengumuman');
Route::get('getSemuaLoker', 'Mobile\InfoController@getSemuaLoker');
Route::get('getPoster', 'Mobile\InfoController@getPoster');
Route::get('getProfilLembaga', 'Mobile\InfoController@getProfilLembaga');
Route::post('loginMember', 'Mobile\MemberController@loginMember');
Route::post('getMember', 'Mobile\MemberController@getMember');
Route::post('updatePassword', 'Mobile\MemberController@updatePassword');
Route::post('updateDataDiri', 'Mobile\MemberController@updateDataDiri');
Route::post('updateUkuran', 'Mobile\MemberController@updateUkuran');
Route::post('updateAlamat', 'Mobile\MemberController@updateAlamat');
Route::post('updateToken', 'Mobile\MemberController@updateToken');
Route::post('updateMinat', 'Mobile\MemberController@updateMinat');
Route::post('registrasiMember', 'Mobile\MemberController@registrasiMember');
Route::get('getKota', 'Mobile\MemberController@getKota');
Route::get('getProvinsi', 'Mobile\MemberController@getProvinsi');
Route::post('getCurrentWeather', 'Mobile\MemberController@getCurrentWeather');
Route::get('getMinat', 'Mobile\InfoController@getMinat');
Route::post('getMinatByMember', 'Mobile\InfoController@getMinatMember');
Route::post('getLokerByMinat', 'Mobile\InfoController@getLokerByMinat');
Route::post('getSemuaLokerByMinat', 'Mobile\InfoController@getSemuaLokerByMinat');
Route::get('getPelatihan', 'Mobile\PelatihanController@getPelatihan');
Route::post('daftarPelatihan', 'Mobile\PelatihanController@daftarPelatihan');
Route::post('getPelatihanByMember', 'Mobile\PelatihanController@getPelatihanByMember');
Route::post('getSertifikatMember', 'Mobile\MemberController@getSertifikatMember');

//tes
Route::get('tes', 'Mobile\FirebaseController@tes');
Route::get('tes2', 'Mobile\FirebaseController@tes2');
Route::get('tesLoker', 'Mobile\FirebaseController@tesLokerNotif');
Route::get('tesKonten', 'Mobile\FirebaseController@tesKonten');
Route::get('tesMinat', 'Mobile\FirebaseController@tesMinat');
Route::get('tesss', 'Mobile\InfoController@tesss');
