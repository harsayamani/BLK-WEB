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

Route::get('getBerita', 'Mobile\InfoController@getBerita');
Route::get('getLoker', 'Mobile\InfoController@getLoker');
Route::get('getPoster', 'Mobile\InfoController@getPoster');
Route::get('getProfilLembaga', 'Mobile\InfoController@getProfilLembaga');
Route::post('loginMember', 'Mobile\MemberController@loginMember');
Route::post('registrasiMember', 'Mobile\MemberController@registrasiMember');
