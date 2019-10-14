<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\APIController as API;
use App\Member;
use App\Cities;
use App\Province;

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

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login');
        }else{
            return view('Admin/kelolaAkunMember', compact('member', 'ac', 'ap'));
        }
    }

    public function ajax($id){
        $kota = Cities::where('id_provinsi', $id)->get();
        return response()->json($kota);
    }

}
