<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PendaftaranProgram;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB as DB;

class PelatihanController extends Controller
{
    public function getPelatihan(){
      $skema = DB::table('skema_pelatihan')
              // ->select('kd_skema', 'pelatihan.nama_program', 'gelombang.nama_gelombang', 'tgl_awal_pendaftaran', 'tgl_akhir_pendaftaran', 'tgl_seleksi', 'tgl_awal_pelaksana', 'tgl_akhir_pelaksana', 'kuota', '')
               ->join('program_pelatihan as pelatihan', 'pelatihan.kd_program', '=', 'skema_pelatihan.kd_program')
               ->join('gelombang', 'gelombang.kd_gelombang', '=', 'skema_pelatihan.kd_gelombang')
               ->orderBy('skema_pelatihan.created_at', 'ASC')
               ->get();

      return response()->json([
        'status_code' => 200,
        'data' => $skema,
        'message' => 'Success!'
      ]);
    }

    public function daftarPelatihan(Request $request){
        $kdPengguna    = $request->kd_pengguna;
        $kdSkema       = $request->kd_skema;

        $cekPendaftar = DB::table('pendaftaran_program')
                        ->where('kd_skema', $kdSkema)
                        ->count();

        $cekKuotaSkema = DB::table('skema_pelatihan')
                         ->where('kd_skema', $kdSkema)
                         ->value('kuota');

        if($cekPendaftar >= $cekKuotaSkema){
          $status = 0;
        }else{
          $status = 1;
        }

        $getDate = Carbon::now('Asia/Jakarta');
        $tgl = str_replace('-','', $getDate->toDateString());
        $jam = str_replace(':','', $tgl);
        //$rand = $jam . rand(1, 1000);
        //$kdPendaftaran = str_replace(' ','',$rand);

        //versi lama
        //$kdPendaftaran = $jam . '-' . $kdSkema . '-' . $kdPengguna;
        //versi terbaru
        $kdPendaftaran = PendaftaranProgram::all()->last()->kd_pendaftaran+1;

        $cek = DB::table('pendaftaran_program')
               ->where('kd_skema', $kdSkema)
               ->where('kd_pengguna', $kdPengguna)
               ->count();

        if($cek > 0){
          return response()->json([
            'status_code' => 400,
            'message' => ['Anda telah melakukan pendaftaran!']
          ], 200);
        }else{
          $daftar = new PendaftaranProgram;
          $daftar->kd_pendaftaran = $kdPendaftaran;
          $daftar->kd_pengguna = $kdPengguna;
          $daftar->kd_skema = $kdSkema;
          $daftar->status = $status;

          if($daftar->save()){
            return response()->json([
              'status_code' => 200,
              'message' => ['Pendaftaran Berhasil!']
            ], 200);
          }else{
            return response()->json([
              'status_code' => 400,
              'message' => ['Pendaftaran Gagal!']
            ], 200);
          }
        }
    }

    public function getPelatihanByMember(Request $request){
        $kdPengguna = $request->kd_pengguna;

        $data = DB::table('pendaftaran_program')
                ->join('skema_pelatihan as skema', 'skema.kd_skema', '=', 'pendaftaran_program.kd_skema')
                ->join('gelombang', 'gelombang.kd_gelombang', '=', 'skema.kd_gelombang')
                ->join('program_pelatihan as program', 'program.kd_program', '=', 'skema.kd_program')
                ->where('kd_pengguna', $kdPengguna)
                ->get();

        return response()->json([
            'status_code' => 200,
            'data' => $data,
            'message' => 'Success!'
        ]);
    }
}
