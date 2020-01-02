<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Konten;
use App\Loker;
use App\Profil;
use App\Galeri;
use App\KategoriKonten;
use App\Link;
use App\ProgramPelatihan;
use App\SkemaPelatihan;
use App\Gelombang;

class PublicController extends Controller
{
    public function index(){
        $link_dinas =  Link::all();
        $konten = Konten::orderBy('created_at', 'desc')->paginate(10);
        $loker_last = Loker::all()->last();
        $berita_last = Konten::where('kd_kategori', 1311)->first();
        $pengumuman_last = Konten::where('kd_kategori', 1312)->first();
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(3);
        $konten_populer = Konten::orderBy('stat', 'desc')->paginate(3);
        $loker_populer = Loker::orderBy('stat', 'desc')->paginate(3);

        return view('Public/home', compact('link_dinas', 'konten','loker_last', 'berita_last', 'pengumuman_last', 'galeri', 'konten_populer', 'loker_populer'));
    }

    public function detail_konten($kd_konten){
        $konten = Konten::where('kd_konten', $kd_konten)->first();
        if($konten->stat == null){
            $konten->stat = 1;
            $konten->save();
        }else{
            $konten->stat = $konten->stat + 1;
            $konten->save();
        }
        
        return view('Public/detailKonten', compact('konten'));
    }

    public function loker(){
        $link_dinas =  Link::all();
        $konten = Konten::orderBy('created_at', 'desc')->paginate(10);
        $loker = Loker::orderBy('created_at', 'desc')->paginate(10);
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(3);
        $konten_populer = Konten::orderBy('stat', 'desc')->paginate(3);
        $loker_populer = Loker::orderBy('stat', 'desc')->paginate(3);

        return view('Public/infoLoker', compact('link_dinas', 'konten', 'loker','galeri', 'konten_populer', 'loker_populer'));
    }

    public function detail_loker($kd_loker){
        $loker = Loker::findOrFail($kd_loker);
        if($loker->stat == null){
            $loker->stat = 1;
            $loker->save();
        }else{
            $loker->stat = $loker->stat + 1;
            $loker->save();
        }

        return view('Public/detailLoker', compact('loker'));
    }

    public function galeri(){
        $galeri = Galeri::orderBy('created_at', 'desc')->paginate(4);

        return view('Public/galeri', compact('galeri'));
    }

    public function profil(){
        $profil = Profil::all()->last();

        return view('Public/profilLembaga', compact('profil'));
    }

    public function konten_kategori($kd_kategori_konten){
        $link_dinas =  Link::all();
        $konten = Konten::where('kd_kategori', $kd_kategori_konten)->orderBy('created_at', 'desc')->paginate(10);
        $galeri = Galeri::orderBy('created_at', 'desc')->get();
        $kategori = KategoriKonten::where('kd_kategori_konten', $kd_kategori_konten)->value('kategori_konten');
        $konten_populer = Konten::orderBy('stat', 'desc')->paginate(3);
        $loker_populer = Loker::orderBy('stat', 'desc')->paginate(3);

        return view('Public/kontenKategori', compact('link_dinas', 'konten', 'kategori', 'galeri', 'konten_populer', 'loker_populer'));
    }

    public function program_pelatihan(){
        $i = 0;
        $program = ProgramPelatihan::all();

        return view('Public/programPelatihan', compact('i', 'program'));
    }

    public function detail_program_pelatihan($kd_program){
        $program = ProgramPelatihan::findOrFail($kd_program);

        return view('Public/detailProgram', compact('program'));
    }

    public function jadwal_pelatihan(){
        $skema = SkemaPelatihan::orderBy('created_at', 'desc')->get();
        $gelombang = Gelombang::all();

        return view('Public/jadwalPelatihan', compact('skema', 'gelombang'));
    }

    public function filter_jadwal(Request $request){
        $skema = SkemaPelatihan::where('kd_gelombang', $request->kd_gelombang)->orderBy('created_at', 'desc')->get();
        $gelombang = Gelombang::all();
    
        return view('Public/jadwalPelatihan', compact('skema', 'gelombang'));
    }

}
