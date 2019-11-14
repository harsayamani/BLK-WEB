<?php

namespace App\Http\Controllers\Mobile;

use DB;
use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

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
              $data = DB::table('member')->where('username', $request->username)->get();
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
            "nomor_ktp.digits" => "Nomor KTP harus 16 karakter",
            "nomor_ktp.regex" => "Nomor KTP harus berupa angka",
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
          $create = Member::create($request->all());
                if ($create) {
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
