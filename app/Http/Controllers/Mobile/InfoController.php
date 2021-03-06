<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\PendaftaranProgram;

class InfoController extends Controller
{
    public function getDetailInfo(Request $request){
      $kd = $request->kd_konten;
      $tipe = $request->tipe;

      if($tipe == 1){
          $data = DB::table('konten')
                  ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten' ,'isi_konten', 'foto', 'konten.created_at as tgl_upload')
                  ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                  ->where('kd_konten', $kd)
                  ->get();
      }else if($tipe == 2){
          $data = DB::table('loker')
                  ->select('kd_loker as id', 'judul', 'minat.minat as kategori_konten', 'isi as isi_konten' ,'foto', 'loker.created_at as tgl_upload')
                  ->join('minat', 'minat.kd_minat', '=', 'loker.kd_minat')
                  ->where('kd_loker', $kd)
                  ->get();
      }else{
          $data = false;
      }

      if($data){
        return response()->json([
          'status_code' => 200,
          'data' => $data,
          'message' => 'Success!'
        ], 200);
      }else{
        return response()->json([
          'status_code' => 400,
          'message' => 'Failed!'
        ], 200);
      }
    }

    public function getBerita(){
      $berita = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten' ,'isi_konten', 'foto', 'konten.created_at as tgl_upload')
                ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                ->where('kd_kategori', '1311')
                ->orderBy('konten.created_at', 'DESC')
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

    public function getSemuaBerita(){
      $berita = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten' ,'isi_konten', 'foto', 'konten.created_at as tgl_upload')
                ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                ->where('kd_kategori', '1311')
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

    public function getPengumuman(){
      $pengumuman = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten' ,'isi_konten', 'foto', 'konten.created_at as tgl_upload')
                ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                ->where('kd_kategori', '1312')
                ->orderBy('konten.created_at', 'DESC')
                ->take(5)
                ->get();

      if($pengumuman){
        return response()->json([
          'status_code' => 200,
          'data' => $pengumuman,
          'message' => 'Success!'
        ], 200);
      }else{
        return response()->json([
          'status_code' => 400,
          'message' => 'Failed!'
        ], 200);
      }
    }

    public function getSemuaPengumuman(){
      $pengumuman = DB::table('konten')
                ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten' ,'isi_konten', 'foto', 'konten.created_at as tgl_upload')
                ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                ->where('kd_kategori', '1312')
                ->get();

      if($pengumuman){
        return response()->json([
          'status_code' => 200,
          'data' => $pengumuman,
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
      $loker = DB::table('loker')
                ->select('kd_loker as id', 'judul', 'minat.minat as kategori_konten', 'isi as isi_konten' ,'foto', 'loker.created_at as tgl_upload')
                ->join('minat', 'minat.kd_minat', '=', 'loker.kd_minat')
                ->orderBy('loker.created_at', 'DESC')
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

    public function getSemuaLoker(){
      $loker = DB::table('loker')
                ->select('kd_loker as id', 'judul', 'minat.minat as kategori_konten', 'isi as isi_konten' ,'foto', 'loker.created_at as tgl_upload')
                ->join('minat', 'minat.kd_minat', '=', 'loker.kd_minat')
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

    public function getLokerByMinat(Request $request){
      $listMinat = $request->listMinat;

      $data = [];
      $temp = [];

      for($i = 0; $i < sizeof($listMinat); $i++){
        $temp = $data;
        $loker = DB::table('loker')
                  ->select('kd_loker as id', 'judul', 'minat.minat as kategori_konten', 'isi as isi_konten' ,'foto', 'loker.created_at as tgl_upload')
                  ->join('minat', 'minat.kd_minat', '=', 'loker.kd_minat')
                  ->where('loker.kd_minat', $listMinat[$i])
                  ->orderBy('loker.created_at', 'DESC')
                  ->get()
                  ->toArray();

          $data = array_merge($temp, $loker);
      }

      $collect = collect($data);
      $sorted  = $collect->sortByDesc('tgl_upload');
      $sorted->splice(5);

      return response()->json([
        'status_code' => 200,
        'data' => $sorted->values()->all(),
        'message' => 'Success!'
      ]);
    }

    public function getSemuaLokerByMinat(Request $request){
      $listMinat = $request->listMinat;

      $data = [];
      $temp = [];

      for($i = 0; $i < sizeof($listMinat); $i++){
        $temp = $data;
        $loker = DB::table('loker')
                  ->select('kd_loker as id', 'judul', 'minat.minat as kategori_konten', 'isi as isi_konten' ,'foto', 'loker.created_at as tgl_upload')
                  ->join('minat', 'minat.kd_minat', '=', 'loker.kd_minat')
                  ->where('loker.kd_minat', $listMinat[$i])
                  ->orderBy('loker.created_at', 'DESC')
                  ->get()
                  ->toArray();

          $data = array_merge($temp, $loker);
      }

      $collect = collect($data);
      $sorted  = $collect->sortByDesc('tgl_upload');

      return response()->json([
        'status_code' => 200,
        'data' => $sorted->values()->all(),
        'message' => 'Success!'
      ]);
    }

    //mengambil id_minat si member dari table minat_member
    public function getMinatMember(Request $request){
      $data = DB::table('minat_member')
              ->select('kd_minat as id_minat')
              ->where('kd_pengguna', $request->kd_pengguna)
              ->get();

      return response()->json([
        'status_code' => 200,
        'data' => $data,
        'message' => 'Success!'
      ]);
    }

    //mengampil data minat untuk dipilih oleh member
    public function getMinat(){
      $minat = DB::table('minat')
               ->select('kd_minat as id_minat', 'minat')
               ->get();

      if($minat){
        return response()->json([
          'status_code' => 200,
          'data' => $minat,
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
                ->select('kd_konten as id', 'judul_konten as judul', 'kategori.kategori_konten','isi_konten' ,'foto as poster', 'konten.created_at as tgl_upload')
                ->join('kategori_konten as kategori', 'kategori.kd_kategori_konten', '=', 'konten.kd_kategori')
                ->where('kd_kategori', '1313')
                ->orderBy('konten.created_at', 'DESC')
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

    public function tesss(){
        $pendaftaran = PendaftaranProgram::all()->last()->kd_pendaftaran;
        $peserta = 12;
        $naik = $pendaftaran+$peserta;
        return response()->json([
          'pendaftar akhir' => $pendaftaran,
          'penambahan peserta' => $peserta,
          'pendaftar terupdate' => $naik
        ]);
    }
}
