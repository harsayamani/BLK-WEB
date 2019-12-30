<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Member;
use App\PendaftaranProgram;
use App\ProgramPelatihan;
use App\SkemaPelatihan;
use App\Province;
use App\Cities;
use App\Minat;
use App\Sertifikat;
use Exception;
use Illuminate\Support\Facades\Mail as Mail;

class MemberSideController extends Controller
{
    public function login_index(){
        if(!Session::get('loginMember')){
            return view('/Member/loginMember');
        }else{
			return redirect('/member/dashboard');
        }   
    }

    public function login_proses(Request $request){
        $username = $request->username;
        $password = $request->password;

        $data = Member::where('username', $username)->first();

        if($data){ 
            if(Hash::check($password, $data->password)){
                Session::put('loginMember',TRUE);
                Session::put('nama_lengkap', $data->nama_lengkap);
                Session::put('kd_pengguna', $data->kd_pengguna);
                return redirect('/member/dashboard');
            }else{
                return redirect('/login')->with('alert', 'Password Salah');
            }
        }else{
            return redirect('/login')->with('alert', 'Username Salah');
        }
    }

    public function logout(){
        if(Session::get('loginMember')){
            Session::flush('loginMember');
            return redirect('/login')->with('alert','Anda sudah logout');
        } 
    }

    public function daftar_akun(){
        if(!Session::get('loginMember')){
            return view('/Member/registerMember');
        }else{
			return redirect('/member/dashboard');
        }   
    }

    public function daftar_proses(Request $request){
        $this->validate($request, [
            'nik=' => '|unique:member|digits:16|numeric|regex:/^([1-9][0-9]+)/',
            'nama_lengkap' => '|max:30',
            'username' => '|unique:member|max:20',
            'password' => '|min:8',
            'repassword' => '|min:8',
            'email' => '|unique:member|max:30'
        ]);
        
        $member = Member::all();
        $kd_pengguna = 0;

        if($member->count()>0){
            $kd_pengguna = Member::all()->last()->kd_pengguna+1;
        }else{
            $kd_pengguna = 1000000001; 
        }

        $member = new Member();
        $member->kd_pengguna = $kd_pengguna;
        $member->nomor_ktp = $request->nik;
        $member->nama_lengkap = $request->nama_lengkap;
        $member->email = $request->email;
        $member->username = $request->username;
        
        if($request->repassword == $request->password){
            $member->password = Hash::make($request->password, [
                'rounds' => 12
            ]);
            $member->save();
            return redirect('/login')->with('alert', 'Anda sudah daftar, silahkan login untuk masuk');
        }else{
            return redirect('/daftarAkun')->with('alert', 'Password ulang tidak sama');
        }
    }

    public function dashboard(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');

            $member = Member::where('kd_pengguna', $kd_pengguna)->first();
            $pendaftaran = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->first();
            $skema = null;
            $program = null;
            $skema_all = null;

            if($pendaftaran == null){
                $skema = [];
                $program = [];
                $skema_all = [];
            }else{
                $skema = SkemaPelatihan::where('kd_skema', $pendaftaran->kd_skema)->first();
                $program = ProgramPelatihan::where('kd_program', $skema->kd_program)->first();
                $skema_all = SkemaPelatihan ::where('kd_skema', $pendaftaran->kd_skema)->get();   
            }
			return view('/Member/dashboardMember', compact('nama_lengkap', 'kd_pengguna', 'pendaftaran', 'skema', 'program', 'member', 'skema_all'));
        }        
    }

    public function akun(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');

            $member = Member::where('kd_pengguna', $kd_pengguna)->first();
            $kota = Cities::all();
            $provinsi = Province::all();
            $minat = Minat::all();
            return view('/Member/akunMember', compact('nama_lengkap', 'kd_pengguna', 'member', 'kota', 'provinsi', 'minat'));
        }
    }

    public function ubah_akun(Request $request){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $this->validate($request, [
                'nomor_ktp=' => '|digits:16|numeric|regex:/^([1-9][0-9]+)/',
                'alamat_lengkap' => '|max:255',
                'thn_ijazah' => '|digits:4|numeric|regex:/^([1-9][0-9]+)/',
                'username' => '|max:191',
                'nomor_kontak' => '|max:15',
                'email' => '|max:30'
            ]);
    
            $member = Member::findOrFail($request->kd_pengguna);
    
            $member->kd_pengguna = $request->kd_pengguna;
            $member->nomor_ktp = $request->nomor_ktp;
            $member->nama_lengkap = $request->nama_lengkap;
            $member->jenis_kelamin = $request->jenis_kelamin;
            $member->tempat_lahir = $request->tempat_lahir;
            $member->tgl_lahir = $request->tgl_lahir;
            $member->pend_terakhir = $request->pend_terakhir;
            $member->thn_ijazah = $request->thn_ijazah;
            $member->alamat_lengkap = $request->alamat_lengkap;
            $member->provinsi = $request->provinsi;
            $member->kabupaten_kota =  $request->kabupaten_kota;
            $member->kodepos = $request->kodepos;
            $member->nomor_kontak = $request->nomor_kontak;
            
            if($request->get('ukuran_baju')){
                $member->ukuran_baju = $request->ukuran_baju;
            }else{
                $member->ukuran_baju = $request->ukuran_baju_lain;
            }
    
            if($request->get('ukuran_sepatu')){
                $member->ukuran_sepatu = $request->ukuran_sepatu;
            }else{
                $member->ukuran_sepatu = $request->ukuran_sepatu_lain;
            }
    
            $member->username = $request->username;
            $member->password = $request->password;
            $member->email = $request->email;
            $member->save();
    
            return redirect('/member/akun')->with('alert success', 'Data diri berhasil diubah!');
        }
    }

    public function sertifikat(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');
            $sertifikat = Sertifikat::where('kd_pengguna', $kd_pengguna)->get();
            $i = 0;

            return view('/Member/sertifikatMember', compact('nama_lengkap', 'kd_pengguna', 'sertifikat', 'i'));
        }
    }

    public function lupa_password(){
        if(!Session::get('loginMember')){
            return view('/Member/lupaPasswordMember');
        }else{
			return redirect('/member/dashboard');
        } 
    }

    public function lupa_password_proses(Request $request){
        $member = Member::where('email', $request->email)->first();

        if($member == null){
            return redirect('/lupaPassword')->with('alert', 'Email tidak terdaftar');
        }else{
            try{
                Mail::send('Member/emailLupaPassword', ['nama' => $member->nama_lengkap, 'kd_pengguna' => $member->kd_pengguna], function ($message) use ($request)
                {
                    $message->subject('Konfirmasi Pengubahan Password Akun BLK Kabupaten Indramayu');
                    $message->from('support@blkindramayu.com', 'Balai Latihan Kerja Kabupaten Indramayu');
                    $message->to($request->email);
                });
                return redirect('/lupaPassword')->with('alert-success', 'Cek email anda untuk dilakukan pengubahan password');
            }catch(Exception $e){
                return redirect('/lupaPassword')->with('alert', $e);
            }
        }
    }

    public function ganti_password($kd_pengguna){
        $member = Member::where('kd_pengguna', $kd_pengguna)->first();

        return view('/Member/gantiPasswordMember', compact('member'));
    }

    public function ganti_password_proses(Request $request, $kd_pengguna){
        $this->validate($request, [
            'password_baru' => '|min:8'
        ]);

        $password_lama = $request->password_lama;
        $password_baru = $request->password_baru;
        $password_baru_ulang = $request->password_baru_ulang;
        $password = Member::where('kd_pengguna', $kd_pengguna)->value('password');

        if(Hash::check($password_lama, $password)){
            if($password_baru == $password_baru_ulang){
                $member = Member::findOrFail($kd_pengguna);
                $password_baru = Hash::make($password_baru, [
                    'rounds' => 12
                ]);
                $member->password = $password_baru;
                $member->save();
                return redirect()->back()->with('alert-success', 'Password berhasil diubah');
            }else{
                return redirect()->back()->with('alert', 'Password ulang tidak sama');
            }
        }else{
            return redirect()->back()->with('alert', 'Password tidak terdaftar');
        }
    }
}
