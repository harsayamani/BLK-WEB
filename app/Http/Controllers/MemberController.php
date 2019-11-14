<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use JD\Cloudder\Facades\Cloudder;
use App\Http\Controllers\APIController as API;
use Mail;
use App\Member;
use App\Cities;
use App\Province;
use App\ProgramPelatihan;
use App\Sertifikat;
use App\PendaftaranProgram;
use App\SkemaPelatihan;

class MemberController extends Controller
{
    public function akun_member(){

        $member = Member::all();
        $api = new API;
        $i = 0;

        $city = Cities::all()->count();
        if($city<1){
            $ac = $api->getCURL('city');
            foreach ($ac->rajaongkir->results as $key) {	
                $n = new Cities;
                $n->id = $key->city_id;
                $n->id_provinsi = $key->province_id;
                $n->provinsi = $key->province;
                $n->nama = $key->city_name;
                $n->type = $key->type;
                $n->kodepos = $key->postal_code;
                $n->save();
            }
        }

        $province = Province::all()->count();
        if($province<1){
            $ap = $api->getCURL('province');
            foreach ($ap->rajaongkir->results as $key) {	
                $n = new \App\Province;
                $n->id = $key->province_id;
                $n->nama = $key->province;
                $n->save();
            }
        }

        $provinsi = Province::all();
        $kota = Cities::all();

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaAkunMember', compact('i', 'member', 'kota', 'provinsi'));
        }
    }

    public function tambah_akun_member(Request $request){

        $this->validate($request, [
            'nomor_ktp=' => '|unique:member|digits:16|numeric|regex:/^([1-9][0-9]+)/',
            'alamat_lengkap' => '|max:255',
            'thn_ijazah' => '|digits:4|numeric|regex:/^([1-9][0-9]+)/',
            'username' => '|unique:member|max:191',
            'nomor_kontak' => '|max:15',
            'email' => '|unique:member|max:30'
        ]);

        $member = new Member;
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
        $member->password = Hash::make($request->password);
        $member->email = $request->email;
        $member->save();

        $pesan = "Informasi Akun BLK Kabupaten Indramayu, Username : ";
        $username = "Username : ".$request->username;
        $password = "Password : ".$request->password;

        try{
            Mail::send('Admin/email', ['nama' => $request->nama_lengkap, 'pesan' => $pesan, 'username'=>$username, 'password'=>$password], function ($message) use ($request)
            {
                $message->subject('Informasi Akun BLK Kabupaten Indramayu');
                $message->from('support@blkindramayu.com', 'Balai Latihan Kerja Kabupaten Indramayu');
                $message->to($request->email);
            });
        }catch(Exception $e){
            return redirect('/admin/dataMember/akunMember')->with('alert danger', $e);
        }
        
        return redirect('/admin/dataMember/akunMember')->with('alert success', 'Akun berhasil ditambahkan!');
    }

    public function ubah_akun_member(Request $request){

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
        $member->tgl_lahir = $request->tgl_lahir2;
        $member->pend_terakhir = $request->pend_terakhir;
        $member->thn_ijazah = $request->thn_ijazah;
        $member->alamat_lengkap = $request->alamat_lengkap;
        $member->provinsi = $request->provinsi2;
        $member->kabupaten_kota =  $request->kabupaten_kota2;
        $member->kodepos = $request->kodepos2;
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

        return redirect('/admin/dataMember/akunMember')->with('alert success', 'Akun berhasil diubah!');
    }

    public function hapus_akun_member($kd_pengguna){
        $member = Member::findOrFail($kd_pengguna);
        $member->delete($member);

        return redirect('/admin/dataMember/akunMember')->with('alert danger', 'Akun berhasil dihapus!');
    }

    public function sertifikat(){

        $member = Member::orderBy('nama_lengkap', 'asc')->get();
        $program = ProgramPelatihan::all();
        $sertifikat = Sertifikat::all();
        $program2 = ProgramPelatihan::all();
        $member2 = Member::all();

        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaSertifikat', compact('member', 'program', 'sertifikat', 'i', 'program2', 'member2'));
        }
    }

    public function tambah_sertifikat(Request $request){

        $this->validate($request, [
            'kd_sertifikat=' => '|unique:sertifikat'
        ]);

        try{
            //Upload gambar ke cloudinary
            $gambar_sertifikat = $request->gambar_sertifikat;
            Cloudder::upload($gambar_sertifikat);
            list($width, $height) = getimagesize($gambar_sertifikat);
            $url_gambar= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        }catch(Exception $e){
            return redirect('/admin/dataMember/sertifikat')->with('alert danger', $e);
        }      

        $sertifikat = new Sertifikat();
        $sertifikat->kd_sertifikat = $request->kd_sertifikat;
        $sertifikat->gambar_sertifikat = $url_gambar;
        $sertifikat->kd_pengguna = $request->kd_pengguna;
        $sertifikat->kd_program = $request->kd_program;
        $sertifikat->tgl_terbit = $request->tgl_terbit;
        $sertifikat->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $sertifikat->save();
        
        return redirect('/admin/dataMember/sertifikat')->with('alert success', 'Sertifikat berhasil ditambahkan!');
    }

    public function ubah_sertifikat(Request $request){

        try{
            //Upload gambar ke cloudinary
            $gambar_sertifikat = $request->gambar_sertifikat;
            Cloudder::upload($gambar_sertifikat);
            list($width, $height) = getimagesize($gambar_sertifikat);
            $url_gambar= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        }catch(Exception $e){
            return redirect('/admin/dataMember/sertifikat')->with('alert danger', $e);
        }      

        $sertifikat = Sertifikat::findOrdFail($request->kd_sertifikat);
        $sertifikat->kd_sertifikat = $request->kd_sertifikat;
        $sertifikat->gambar_sertifikat = $url_gambar;
        $sertifikat->kd_pengguna = $request->kd_pengguna;
        $sertifikat->kd_program = $request->kd_program;
        $sertifikat->tgl_terbit = $request->tgl_terbit;
        $sertifikat->tgl_kadaluarsa = $request->tgl_kadaluarsa;
        $sertifikat->save();
        
        return redirect('/admin/dataMember/sertifikat')->with('alert success', 'Sertifikat berhasil diubah!');
    }

    public function hapus_sertifikat($kd_sertifikat){
        $sertifikat = Sertifikat::findOrFail($kd_sertifikat);
        $sertifikat->delete($sertifikat);

        return redirect('/admin/dataMember/sertifikat')->with('alert danger', 'Sertifikat berhasil dihapus!');
    }

    public function lembar_pengesahan($kd_sertifikat){
        $sertifikat = Sertifikat::where('kd_sertifikat', $kd_sertifikat)->first();
        $qr_sertifikat = QrCode::format('png')
                        ->merge('images/logo_blk.png', 0.5, true)
                        ->size(500)
                        ->generate($kd_sertifikat);

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login');
        }else{
            return response($qr_sertifikat)->header('Content-type','image/png');
        }
    }
    
    //Ajax Controller
    public function ajax($id){
        $kota = Cities::where('id_provinsi', $id)->get();

        return response()->json($kota);
    }

    public function program($kd_pengguna){
        
        $skema = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->get();

        if($skema->count()>0){
            $kd_skema = PendaftaranProgram::where('kd_pengguna', $kd_pengguna)->value('kd_skema');
            $kd_program = SkemaPelatihan::where('kd_skema', $kd_skema)->value('kd_program');
            $program = ProgramPelatihan::where('kd_program', $kd_program)->get();
        }
        
        return response()->json($program);     
    }

    public function ajax2(Request $request){
        $kodepos = Cities::where('id', $request->id)->value('kodepos');

        return response()->json([
            'kodepos' => $kodepos
        ], 200);
    }
}
