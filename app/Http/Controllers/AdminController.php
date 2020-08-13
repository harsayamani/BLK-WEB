<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Facades\Yugo\SMSGateway\Interfaces\SMS;
use App\Admin;
use App\Member;
use App\PendaftaranProgram;

class AdminController extends Controller
{
    public function index(){
        if(Session::get('loginAdmin')){
            return redirect('/admin/dashboard');
        }else{
            return redirect('/admin/login');
        }
    }

    public function login_index(){
        $member = Member::count();
        if(Session::get('loginAdmin')){
            return redirect('/admin/dashboard');
        }else{
            $admin = Admin::get();
            
            if($admin->count()<1){
                $adm = new Admin();
                $adm->username = "admin";
                $adm->password = "adminblk";
                $adm->save();
            }

            return view('/Admin/loginAdmin', compact('member'));
        }
    }

    public function login_post(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', $username)->first();
        
        if($data){
            if(Hash::check($password, $data->password)){
                Session::put('loginAdmin', TRUE);
                Session::put('username', $data->username);
	            return redirect('/admin/dashboard')->with('alert success', 'Login berhasil');
            }else{
                return redirect('/admin/login')->with('alert', 'Login Gagal / Password Salah');
            }
        }else{
            return redirect('/admin/login')->with('alert', 'Login Gagal / Username Salah');
        }
    }

    public function logout(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            Session()->forget('loginAdmin');
            return redirect('admin/login')->with('alert','Anda sudah logout');	}
    }

    public function dashboard() {
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $member_count = Member::all()->count();
            $peserta_count = PendaftaranProgram::where('status', 1)->get()->count();
            $pendaftar_count = PendaftaranProgram::all()->count();
            $lulus_count = PendaftaranProgram::where('status', 2)->get()->count();
            $tidak_lulus_count = PendaftaranProgram::where('status', 3)->get()->count();

			return view('/Admin/dashboardAdmin', compact('member_count', 'pendaftar_count', 'peserta_count', 'lulus_count', 'tidak_lulus_count'));
		}
    }

    public function ganti_password_index(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }elseif(Session::get('loginAdmin')){
            $username = Session::get('username');
            return view('Admin/gantiPassword', compact('username'));
        }
    }

    public function ganti_password_post(Request $request){
        $password = Admin::where('username', $request->username)->value('password');

        if (Hash::check($request->password_lama, $password)) {
            if($request->password_baru == $request->password_baru_ulang){
                $password = Admin::findOrFail($request->username);
                $password_baru = Hash::make($request->password_baru);
                $password->password = $password_baru;
                $password->save();
                return redirect('/admin/dashboard')->with('alert success', 'Password Admin Telah diganti!');
            }else{
                return redirect('/admin/gantiPassword')->with('alert danger', 'Password Ulang yang Anda Masukkan Salah ');
            }
        }else{
            return view('/admin/gantiPassword')->with('alert danger', 'Password Lama yang Anda Masukkan Salah ');
        }
    }

    public function kelola_pesan(){
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $member = Member::all();

			return view('/Admin/kelolaPesan', compact('member'));
		}
    }

    public function kirim_pesan(Request $request){
        if($request->member !=null){
            for($i=0; $i<count($request->member); $i++){
                $pesan = $request->pesan;
                SMS::send([$request->member[$i]], $pesan);
            }
            return redirect('/admin/kelolaPesan')->with('alert modal success', 'Pesan telah terkirim');
        }else{
            return redirect('/admin/kelolaPesan')->with('alert modal danger', 'Pesan tidak terkirim');
        }
    }

    public function kirim_pesan_nomor(Request $request){
        $this->validate($request, [
            'nomor=' => '|max:16|numeric|regex:/^([1-9][0-9]+)/',
        ]);

        SMS::send([$request->nomor], $request->pesan);
        return redirect('/admin/kelolaPesan')->with('alert modal success', 'Pesan telah terkirim');
    }
}
