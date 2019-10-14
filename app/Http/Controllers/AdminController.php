<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Admin;

class AdminController extends Controller
{
    public function login_index(){
        return view('/Admin/loginAdmin');
    }

    public function login_post(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Admin::where('username', $username)->first();

        echo $data->password;
        echo $password;
        
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

    public function dashboard() {
        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
			return view('/Admin/dashboardAdmin');
		}
    }
}
