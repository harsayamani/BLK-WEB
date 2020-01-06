<?php

namespace App\Http\Controllers\Mobile;

use DB;
use Hash;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Ixudra\Curl\Facades\Curl;

class MemberController extends Controller
{
    public function loginMember(Request $request){
        $auth = auth()->guard('member');

        $messages = [
            "username.min" => "Username Minimal 4 Karakter",
            "password.min" => "Password Minimal 6 Karakter",
        ];
        $credentials = [
            'username'    => $request->username,
            'password' => $request->password,
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:4',
            'password' => 'required|string|min:6',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 1,
                'message' => $validator->messages()->all(),
                'data_member' => []
            ], 200);
        }else{
          if ($auth->attempt($credentials)) {
              $data = DB::table('member')
                      ->select('kd_pengguna', 'nomor_ktp', 'nama_lengkap', 'kota.nama as tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'alamat_lengkap', 'prov.nama as provinsi', 'kota.nama as kabupaten_kota', 'member.kodepos', 'pend_terakhir', 'thn_ijazah', 'nomor_kontak', 'ukuran_baju', 'ukuran_sepatu', 'username', 'password', 'email', 'member.created_at', 'member.updated_at')
                      ->join('cities as kota', 'kota.id', '=', 'member.tempat_lahir')
                      ->join('province as prov', 'prov.id', '=', 'member.provinsi')
                      ->where('username', $request->username)
                      ->get();

              return response()->json([
                  'status_code' => 0,
                  'message' => ['Login Berhasil'],
                  'data_member' => $data
              ]);
          } else {
              return response()->json([
                  'status_code'   => 2,
                  'message' => ['Username atau Password Salah!'],
                  'data_member' => []
              ], 200);
          }
        }
    }

    public function registrasiMember(Request $request){
        $messages = [
            "nomor_ktp.digits" => "Nomor NIK harus 16 karakter",
            "nomor_ktp.regex" => "Nomor NIK harus berupa angka",
            "username.alpha_num" => "Username tidak boleh ada spasi",
            "username.min" => "Username minimal 4 karakter",
            "password.min" => "Password minimal 6 karakter"
        ];

        $validator = Validator::make($request->all(), [
            'nomor_ktp' => 'required|digits:16|not_in:0|regex:/^([1-9][0-9]+)/',
            'username' => 'required|string|alpha_num|min:4',
            'password' => 'required|string|min:6',
        ], $messages);

        if ($validator->fails()) {
            return response()->json([
                'status_code' => 1,
                'message' => $validator->messages()->all(),
            ], 200);
        }else{

          $checkNik = Member::where('nomor_ktp', $request->nomor_ktp)->count();
          $checkUsr = Member::where('username', $request->username)->count();

          if($checkNik > 0){
            return response()->json([
              'status_code' => 3,
              'message' => ['Registrasi Gagal, NIK sudah pernah dipakai!']
            ], 200);
          }else if($checkUsr > 0){
            return response()->json([
              'status_code' => 4,
              'message' => ['Registrasi Gagal, Username sudah pernah dipakai!']
            ], 200);
          }else{
            $member = array(
                'kd_pengguna'   => Member::all()->last()->kd_pengguna+1,
                'nomor_ktp'     => $request->nomor_ktp,
                'nama_lengkap'  => $request->nama_lengkap,
                'tempat_lahir'  => $request->tempat_lahir,
                'tgl_lahir'     => $request->tgl_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'provinsi'      => $request->provinsi,
                'kabupaten_kota'=> $request->kabupaten_kota,
                'alamat_lengkap'=> $request->alamat_lengkap,
                'kodepos'       => $request->kodepos,
                'username'      => $request->username,
                'password'      => Hash::make($request->password, [
                    'rounds' => 12
                ]),
                'email'         => $request->email
                //'status'        => $request->status
            );

            $create = Member::create($member);
                  if ($create) {

                    $getID = DB::table('member')
                             ->where('nomor_ktp', $request->nomor_ktp)
                             ->where('username', $request->username)
                             ->value('kd_pengguna');

                    $dataMinat = $request->listMinat;

                    for($i=0; $i<sizeof($dataMinat); $i++){
                        DB::table('minat_member')
                        ->insert([
                            ['kd_pengguna' => $getID, 'kd_minat' => $dataMinat[$i]]
                        ]);
                    }

                    return response()->json([
                      'status_code' => 0,
                      'message' => ['Registrasi Berhasil']
                    ], 200);
                  }else{
                    return response()->json([
                      'status_code' => 2,
                      'message' => ['Registrasi Gagal']
                    ], 200);
                  }
          }
        }

    }

    public function updatePassword(Request $request){
      $auth = auth()->guard('member');

      $credentials = [
          'username'    => $request->username,
          'password' => $request->password,
      ];

      if ($auth->attempt($credentials)) {
          $updatePassword = Member::where('username', $request->username)
                        ->update(['password'  => Hash::make($request->password_baru)]);

          return response()->json([
              'status_code' => 0,
              'message' => ['Password Berhasil Diubah!']
          ]);
      } else {
          return response()->json([
              'status_code'   => 1,
              'message' => ['Password Lama Salah!']
          ], 200);
      }

    }

    public function updateMinat(Request $request){
        $kdPengguna = $request->kd_pengguna;

        $delete = DB::table('minat_member')
                   ->where('kd_pengguna', $kdPengguna)
                   ->delete();

        if($delete){
          $dataMinat = $request->listMinat;

          for($i=0; $i<sizeof($dataMinat); $i++){
              DB::table('minat_member')
              ->insert([
                  ['kd_pengguna' => $kdPengguna, 'kd_minat' => $dataMinat[$i]]
              ]);
          }

          return response()->json([
            'status_code' => 0,
            'message' => ['Update Berhasil']
          ], 200);
        }else{
          return response()->json([
              'status_code'   => 1,
              'message' => ['Update Gagal']
          ], 200);
        }


    }

    public function updateToken(Request $request){
      if($request->id == 0){
        $token = Member::where('username', $request->username)
                 ->update(['token' => $request->token]);
      }else{
        $token = Member::where('username', $request->username)
                 ->update(['token' => NULL]);
      }

      if($token){
           return response()->json([
             'status_code' => 0,
             'message' => ['Token Berhasil Diupdate']
           ], 200);
       }else{
           return response()->json([
             'status_code' => 1,
             'message' => ['Token Gagal Diupdate']
           ], 200);
       }
    }

    public function updateDataDiri(Request $request){
      $updateMember = Member::where('username', $request->username)
                      ->update([
                        'nama_lengkap'  => $request->nama_lengkap,
                        'tempat_lahir'  => $request->tempat_lahir,
                        'tgl_lahir'     => $request->tgl_lahir,
                        'jenis_kelamin' => $request->jenis_kelamin,
                        'pend_terakhir' => $request->pend_terakhir,
                        'thn_ijazah'    => $request->thn_ijazah,
                        'nomor_kontak'  => $request->nomor_kontak,
                        'email'         => $request->email
                      ]);

      if($updateMember){
        return response()->json([
          'status_code' => 0,
          'message' => ['Update Berhasil']
        ], 200);
      }else{
        return response()->json([
          'status_code' => 1,
          'message' => ['Update Gagal']
        ], 200);
      }
    }

    public function updateUkuran(Request $request){
      $updateMember = Member::where('username', $request->username)
                      ->update([
                        'ukuran_baju'  => $request->ukuran_baju,
                        'ukuran_sepatu'  => $request->ukuran_sepatu
                      ]);

      if($updateMember){
        return response()->json([
          'status_code' => 0,
          'message' => ['Update Berhasil']
        ], 200);
      }else{
        return response()->json([
          'status_code' => 1,
          'message' => ['Update Gagal']
        ], 200);
      }
    }
    public function updateAlamat(Request $request){
      $updateMember = Member::where('username', $request->username)
                      ->update([
                        'alamat_lengkap'  => $request->alamat_lengkap,
                        'provinsi'  => $request->provinsi,
                        'kabupaten_kota'  => $request->kabupaten_kota,
                        'kodepos'  => $request->kodepos
                      ]);

      if($updateMember){
        return response()->json([
          'status_code' => 0,
          'message' => ['Update Berhasil']
        ], 200);
      }else{
        return response()->json([
          'status_code' => 1,
          'message' => ['Update Gagal']
        ], 200);
      }
    }

    public function getMember(Request $request){
      $kdPengguna = $request->kd_pengguna;
      $username = $request->username;

      $data = DB::table('member')
              ->select('kd_pengguna', 'nomor_ktp', 'nama_lengkap', 'kotalahir.nama as tempat_lahir','kotalahir.id as id_kotalahir', 'tgl_lahir', 'jenis_kelamin', 'alamat_lengkap', 'prov.nama as provinsi', 'prov.id as id_provinsi' ,'kota.nama as kabupaten_kota','kota.id as id_kota','member.kodepos', 'pend_terakhir', 'thn_ijazah', 'nomor_kontak', 'ukuran_baju', 'ukuran_sepatu', 'username', 'password',
               'email', 'member.created_at', 'member.updated_at')
              ->join('cities as kotalahir', 'kotalahir.id', '=', 'member.tempat_lahir')
              ->join('cities as kota', 'kota.id', '=', 'member.kabupaten_kota')
              ->join('province as prov', 'prov.id', '=', 'member.provinsi')
              ->where('kd_pengguna', $kdPengguna)
              ->where('username', $username)
              ->get();

      $minat = DB::table('minat_member')
              ->select('kd_minat as id_minat')
              ->where('kd_pengguna', $kdPengguna)
              ->get();

      return response()->json([
          'status_code' => 0,
          'message' => ['Success!'],
          'data_member' => $data,
          'minat_member' => $minat
      ]);
    }

    public function getSertifikatMember(Request $request){
      $kd_pendaftaran = $request->kd_pendaftaran;

      $sertifikat = DB::table('sertifikat')->where('kd_pendaftaran', $kd_pendaftaran)->get();

      return response()->json([
          'status_code' => 0,
          'data' => $sertifikat,
          'message' => 'Success!',
      ]);
    }

    public function getKota(){
      $data = DB::table('cities')
              ->select('id as id_kota', 'nama as kota', 'type')
              ->get();

      return json_encode($data);
    }

    public function getProvinsi(){
      $data = DB::table('province')
              ->select('id', 'nama')
              ->get();

      $list = [];
      for($i=0; $i<sizeof($data); $i++){
          $kota = DB::table('cities')
                  ->select('id as id_kota', 'nama as kota', 'type')
                  ->where('id_provinsi', $data[$i]->id)
                  ->get();

          $list[$i] = [
              'id_provinsi' => $data[$i]->id,
              'provinsi' => $data[$i]->nama,
              'listkota' => $kota
          ];
      }

      return response()->json(
        $list
      );
    }

    public function getCurrentWeather(Request $request){
      $response = Curl::to('https://api.weatherbit.io/v2.0/current')
                  ->withData( array(
                    'city' => $request->city . ",id",
                    'key' => 'dc158300a68b40ecb4c444400929bb92'
                  ))
                  ->asJson()
                  ->get();
      return response()->json(
        $response
      );
    }

}
