<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Mail;
use App\Member;
use App\PendaftaranProgram;
use App\ProgramPelatihan;
use App\SkemaPelatihan;
use App\Province;
use App\Cities;
use App\Minat;
use App\MinatMember;
use App\Sertifikat;
use App\Gelombang;
use Exception;
use Illuminate\Support\Facades\Mail as FacadesMail;

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
            Session()->forget('loginMember');
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
            return redirect('/login')->with('alert-success', 'Anda sudah daftar, silahkan login untuk masuk');
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
            $pendaftaran = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->orderBy('created_at', 'desc')->first();
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
            $minatMember = MinatMember::where('kd_pengguna', $kd_pengguna)->get();

            return view('/Member/akunMember', compact('nama_lengkap', 'kd_pengguna', 'member', 'kota', 'provinsi', 'minat', 'minatMember'));
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

            $minatMember = MinatMember::where('kd_pengguna', $request->kd_pengguna);

            if($minatMember!=null){
                $minatMember->delete($minatMember);
            }

            if($request->kd_minat!=null){
                for($i=0; $i<count($request->kd_minat); $i++){
                    $minat = new MinatMember();
                    $minat->kd_minat = $request->kd_minat[$i];
                    $minat->kd_pengguna = $request->kd_pengguna;
                    $minat->save();
                }
            }
            
            $member->username = $request->username;
            $member->password = $request->password;
            $member->email = $request->email;
            $member->save();
    
            return redirect('/member/akun')->with('alert modal success', 'Data diri berhasil diubah!');
        }
    }

    public function sertifikat(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');
            $pendaftaran = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->orderBy('created_at', 'desc')->value('kd_pendaftaran');
            $sertifikat = Sertifikat::where('kd_pendaftaran', $pendaftaran)->get();
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
        $kd_pengguna = Crypt::encrypt($member->kd_pengguna);

        if($member == null){
            return redirect('/lupaPassword')->with('alert', 'Email tidak terdaftar');
        }else{
            FacadesMail::send('Member/emailLupaPassword', ['nama' => $member->nama_lengkap, 'kd_pengguna' => $kd_pengguna], function ($message) use ($request)
                {
                    $message->subject('Konfirmasi Pengubahan Password Akun BLK Kabupaten Indramayu');
                    $message->from('support@blkindramayu.com', 'Balai Latihan Kerja Kabupaten Indramayu');
                    $message->to($request->email);
                });
            return redirect('/lupaPassword')->with('alert-success', 'Cek email anda, untuk dilakukan pengubahan password');
        }
    }

    public function ganti_password_lupa($nama_lengkap, $kd_pengguna){
        $kd_pengguna_dec = Crypt::decrypt($kd_pengguna);

        $member = Member::where('nama_lengkap', $nama_lengkap)->first();

        $kd_pengguna = Crypt::encrypt($member->kd_pengguna);

        if($kd_pengguna_dec==Crypt::decrypt($kd_pengguna)){
            return view('/Member/gantiPasswordLupa', compact('member'));
        }else{
            return redirect('/login')->with('alert', 'Konfirmasi pengubahan password kedaluarsa!');
        }
    }

    public function ganti_password_lupa_proses(Request $request){
        $this->validate($request, [
            'password_baru' => '|min:8'
        ]);

        if($request->password_baru_ulang == $request->password_baru){
            $member = Member::findOrFail($request->kd_pengguna);
            $member->password = Hash::make($request->password_baru, [
                'rounds' => 12
            ]);
            $member->save();
            return redirect('/login')->with('alert-success', 'Password berhasil diubah');
        }else{
            return redirect()->back()->with('alert', 'Password ulang tidak sama');
        }
    }

    public function ganti_password($kd_pengguna){
        if(!Session::get('kd_pengguna')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $member = Member::where('kd_pengguna', $kd_pengguna)->first();
            return view('/Member/gantiPasswordMember', compact('member'));
        }
    }

    public function ganti_password_proses(Request $request, $kd_pengguna){
        if(!Session::get('kd_pengguna')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
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
                    return redirect('/member/dashboard')->with('alert modal success', 'Password berhasil diubah');
                }else{
                    return redirect()->back()->with('alert', 'Password ulang tidak sama');
                }
            }else{
                return redirect()->back()->with('alert', 'Password tidak terdaftar');
            }
        } 
    }

    public function jadwal_pelatihan(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');
            $skema = SkemaPelatihan::orderBy('created_at', 'desc')->get();
            $gelombang = Gelombang::all();
    
            return view('/Member/jadwalPelatihan', compact('nama_lengkap', 'kd_pengguna', 'skema', 'gelombang'));
        }
    }

    public function pendaftaran_pelatihan(){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');
            $skema = SkemaPelatihan::all();
            $persyaratan = ProgramPelatihan::orderBy('created_at', 'desc')->first()->detail_program;
            $pendaftaran = PendaftaranProgram::orderBy('kd_skema', 'asc')->get();

            $daftar_count = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->get()->count();
            $daftar = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->orderBy('created_at', 'desc')->first();
            $member = Member::where('kd_pengguna', $kd_pengguna)->first();

            if($daftar_count != null){
                if($daftar->status == 3){
                    return view('/Member/pendaftaranPelatihan', compact('nama_lengkap', 'kd_pengguna', 'skema', 'persyaratan', 'pendaftaran'));
                }else{
                    return redirect('/member/dashboard')->with('alert modal danger', 'Anda sudah mendaftar pelatihan');
                }
            }else{
                if ($member->tempat_lahir == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->tgl_lahir == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->jenis_kelamin == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->alamat_lengkap == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->provinsi == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->kabupaten_kota == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->kodepos == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->pend_terakhir == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->thn_ijazah == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->nomor_kontak == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->ukuran_baju == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }elseif ($member->ukuran_sepatu == null){
                    return redirect('/member/akun')->with('alert modal warning', 'Data diri belum lengkap');
                }else{
                    return view('/Member/pendaftaranPelatihan', compact('nama_lengkap', 'kd_pengguna', 'skema', 'persyaratan', 'pendaftaran'));
                }
            }

        }
    }

    public function daftar_pelatihan(Request $request){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $kd_pengguna = $request->kd_pengguna;
            $kd_skema = $request->kd_skema;

            $kuota_skema = SkemaPelatihan::where('kd_skema', $kd_skema)->value('kuota');
            $kuota_tersedia = PendaftaranProgram::where('kd_skema', $kd_skema)->get()->count();

            $pendaftaran = new PendaftaranProgram();
            $pendaftaran->kd_pendaftaran = $request->kd_pendaftaran;
            $pendaftaran->kd_pengguna = $kd_pengguna;
            $pendaftaran->kd_skema = $kd_skema;

            if($kuota_tersedia <= $kuota_skema){
                $pendaftaran->status = 1;
                $pendaftaran->save();
                return redirect('/member/dashboard')->with('alert modal success', 'Pendaftaran sukses. Anda saat ini masuk pada kuota Peserta');        
            }elseif($kuota_tersedia == $kuota_skema){
                $pendaftaran->status = 0;
                $pendaftaran->save();
                return redirect('/member/dashboard')->with('alert modal warning', 'Pendaftaran sukses. Anda saat ini masuk pada kuota Waiting List, tunggu hingga masuk kuota Peserta');
            }
        }
    }

    public function filter_jadwal(Request $request){
        if(!Session::get('loginMember')){
            return redirect('/login')->with('alert', 'Anda harus login terlebih dulu');
        }else{
            $nama_lengkap = Session::get('nama_lengkap');
            $kd_pengguna = Session::get('kd_pengguna');
            $skema = SkemaPelatihan::where('kd_gelombang', $request->kd_gelombang)->orderBy('created_at', 'desc')->get();
            $gelombang = Gelombang::all();
    
            return view('/Member/jadwalPelatihan', compact('nama_lengkap', 'kd_pengguna', 'skema', 'gelombang'));
        }
    }
}
