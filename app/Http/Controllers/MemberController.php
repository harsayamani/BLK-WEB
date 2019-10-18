<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\APIController as API;
use App\Member;
use App\Cities;
use App\Province;
use App\ProgramPelatihan;
use Mail;

class MemberController extends Controller
{
    public function akun_member(){

        $member = Member::all();
        $api = new API;
        $ac = $api->getCURL('city');
        $ap = $api->getCURL('province');

        $city = Cities::all()->count();
        if($city<1){
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
            foreach ($ap->rajaongkir->results as $key) {	
                $n = new \App\Province;
                $n->id = $key->province_id;
                $n->nama = $key->province;
                $n->save();
            }
        }

        $provinsi = Province::all();
        $kota = Cities::all();
        $kota2 = Cities::all();
        $provinsi2 = Province::all();

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login');
        }else{
            return view('Admin/kelolaAkunMember', compact('member', 'kota', 'provinsi', 'kota2', 'provinsi2'));
        }
    }

    public function tambah_akun_member(Request $request){

        $this->validate($request, [
            'nomor_ktp=' => '|unique:member|digits:16|numeric|regex:/^([1-9][0-9]+)/',
            'alamat_lengkap' => '|max:255',
            'thn_ijazah' => '|digits:4|numeric|regex:/^([1-9][0-9]+)/',
            'username' => '|unique:member|max:191',
            'nomor_kontak' => '|max:15',
            'email' => '|max:30'
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
        $member->desa_kelurahan = $request->desa_kelurahan;
        $member->rt = $request->rt;
        $member->rw = $request->rw;
        $member->nomor_kontak = $request->nomor_kontak;
        
        if($request->get('s')){
            $member->ukuran_baju = $request->s;
        }elseif($request->get('m')){
            $member->ukuran_baju = $request->m;
        }elseif($request->get('l')){
            $member->ukuran_baju = $request->l;
        }elseif($request->get('xl')){
            $member->ukuran_baju = $request->xl;
        }elseif($request->get('xxl')){
            $member->ukuran_baju = $request->xxl;
        }else{
            $member->ukuran_baju = $request->ukuran_baju_lain;
        }

        if($request->get('ukuran_sepatu1')){
            $member->ukuran_sepatu = $request->ukuran_sepatu1;
        }elseif($request->get('ukuran_sepatu2')){
            $member->ukuran_sepatu = $request->ukuran_sepatu2;
        }elseif($request->get('ukuran_sepatu3')){
            $member->ukuran_sepatu = $request->ukuran_sepatu3;
        }elseif($request->get('ukuran_sepatu4')){
            $member->ukuran_sepatu = $request->ukuran_sepatu4;
        }elseif($request->get('ukuran_sepatu5')){
            $member->ukuran_sepatu = $request->ukuran_sepatu5;
        }elseif($request->get('ukuran_sepatu6')){
            $member->ukuran_sepatu = $request->ukuran_sepatu6;
        }elseif($request->get('ukuran_sepatu7')){
            $member->ukuran_sepatu = $request->ukuran_sepatu7;
        }elseif($request->get('ukuran_sepatu8')){
            $member->ukuran_sepatu = $request->ukuran_sepatu8;
        }else{
            $member->ukuran_sepatu = $request->ukuran_sepatu_lain;
        }

        $member->username = $request->username;
        $member->password = Hash::make($request->password);
        $member->email = $request->email;
        $member->save();

        $pesan = "Informasi Akun BLK Kabupaten Indramayu \n Username : ".$request->username." \n Password : ".$request->password."";

        Mail::send('Admin/email', ['nama' => $request->nama_lengkap, 'pesan' => $pesan], function ($message) use ($request)
        {
            $message->subject('Informasi Akun BLK Kabupaten Indramayu');
            $message->from('support@blkindramayu.com', 'Balai Latihan Kerja Kabupaten Indramayu');
            $message->to($request->email);
        });

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
        $member->desa_kelurahan = $request->desa_kelurahan;
        $member->rt = $request->rt;
        $member->rw = $request->rw;
        $member->nomor_kontak = $request->nomor_kontak;
        
        if($request->get('s')){
            $member->ukuran_baju = $request->s;
        }elseif($request->get('m')){
            $member->ukuran_baju = $request->m;
        }elseif($request->get('l')){
            $member->ukuran_baju = $request->l;
        }elseif($request->get('xl')){
            $member->ukuran_baju = $request->xl;
        }elseif($request->get('xxl')){
            $member->ukuran_baju = $request->xxl;
        }else{
            $member->ukuran_baju = $request->ukuran_baju_lain;
        }

        if($request->get('ukuran_sepatu1')){
            $member->ukuran_sepatu = $request->ukuran_sepatu1;
        }elseif($request->get('ukuran_sepatu2')){
            $member->ukuran_sepatu = $request->ukuran_sepatu2;
        }elseif($request->get('ukuran_sepatu3')){
            $member->ukuran_sepatu = $request->ukuran_sepatu3;
        }elseif($request->get('ukuran_sepatu4')){
            $member->ukuran_sepatu = $request->ukuran_sepatu4;
        }elseif($request->get('ukuran_sepatu5')){
            $member->ukuran_sepatu = $request->ukuran_sepatu5;
        }elseif($request->get('ukuran_sepatu6')){
            $member->ukuran_sepatu = $request->ukuran_sepatu6;
        }elseif($request->get('ukuran_sepatu7')){
            $member->ukuran_sepatu = $request->ukuran_sepatu7;
        }elseif($request->get('ukuran_sepatu8')){
            $member->ukuran_sepatu = $request->ukuran_sepatu8;
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

        $member = Member::all();
        $program = ProgramPelatihan::all();

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaSertifikat', compact('member', 'program'));
        }
    }
    
    //Ajax Controller
    public function ajax($id){
        $kota = Cities::where('id_provinsi', $id)->get();

        return response()->json($kota);
    }

    public function ajax2(Request $request){
        $kodepos = Cities::where('id', $request->id)->value('kodepos');

        return response()->json([
            'kodepos' => $kodepos
        ], 200);
    }

}
