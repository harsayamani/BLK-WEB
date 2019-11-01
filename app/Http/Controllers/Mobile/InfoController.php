<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class InfoController extends Controller
{
    public function getBerita(){
      $berita = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'foto', 'tgl_rilis as tgl_upload')
                ->where('kd_kategori', '1')
                ->take(5)
                ->get();

      if($berita){
        return response()->json([
          'status_code' => 200,
          'data' => $berita,
          'message' => 'Success!'
        ], 200);
      }else{
        return response()->json([
          'status_code' => 400,
          'message' => 'Failed!'
        ], 200);
      }

    }

    public function getLoker(){
      $loker = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'foto', 'tgl_rilis as tgl_upload')
                ->where('kd_kategori', '2')
                ->take(5)
                ->get();

      if($loker){
        return response()->json([
          'status_code' => 200,
          'data' => $loker,
          'message' => 'Success!'
        ], 200);
      }else{
        return response()->json([
          'status_code' => 400,
          'message' => 'Failed!'
        ], 200);
      }
    }

    public function getPoster(){
      $poster = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'foto as poster', 'tgl_rilis as tgl_upload')
                ->where('kd_kategori', '3')
                ->take(5)
                ->get();

      if($poster){
        return response()->json([
          'status_code' => 200,
          'data' => $poster,
          'message' => 'Success!'
        ], 200);
      }else{
        return response()->json([
          'status_code' => 400,
          'message' => 'Failed!'
        ], 200);
      }
    }

    public function getProfilLembaga(){
      $data1 = DB::table('profil')
              ->select('visi_misi')
              ->value('visi_misi');

      $data2 = DB::table('profil')
               ->select('struktur_organisasi')
               ->value('struktur_organisasi');

      $id = DB::table('profil')
            ->select('kd_profil')
            ->value('kd_profil');

      $alamat = DB::table('profil')
                ->select('alamat')
                ->value('alamat');

      $kontak = DB::table('profil')
                ->select('kontak')
                ->value('kontak');

      $email = DB::table('profil')
               ->select('email')
               ->value('email');

      $data = [
        ['image' => $data1], ['image' => $data2]
      ];

      return response()->json([
          'id' => $id,
          'data' => $data,
          'alamat' => $alamat,
          'kontak' => $kontak,
          'email' => $email
      ], 200);
    }
}
