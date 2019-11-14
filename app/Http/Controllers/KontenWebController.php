<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use JD\Cloudder\Facades\Cloudder;
use App\KategoriKonten;
use App\Konten;
use App\Link;
use App\Media;
use App\Galeri;
use App\Profil;

class KontenWebController extends Controller
{
    public function kategori_konten(){

        $kategori_konten = KategoriKonten::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaKategoriKonten', compact('kategori_konten', 'i'));
        }
    }

    public function tambah_kategori_konten(Request $request){

        $this->validate($request, [
            'kd_kategori_konten' => '|unique:kategori_konten|numeric|regex:/^([1-9][0-9]+)/',
            'kategori_konten' => '|unique:kategori_konten|max:30',
        ]);

        $kategori_konten = new KategoriKonten();
        $kategori_konten->kd_kategori_konten = $request->kd_kategori_konten;
        $kategori_konten->kategori_konten = $request->kategori_konten;
        $kategori_konten->save();

        return redirect('/admin/dataKonten/kategoriKonten')->with('alert success', 'Kategori berhasil ditambahkan!');
    } 

    public function ubah_kategori_konten(Request $request){

        $this->validate($request, [
            'kode_kategori_konten' => '|numeric|regex:/^([1-9][0-9]+)/',
            'kategori_konten' => '|max:30',
        ]);

        $kategori_konten = KategoriKonten::findOrFail($request->kd_kategori_konten);
        $kategori_konten->kd_kategori_konten = $request->kd_kategori_konten;
        $kategori_konten->kategori_konten = $request->kategori_konten;
        $kategori_konten->save();

        return redirect('/admin/dataKonten/kategoriKonten')->with('alert success', 'Kategori berhasil diubah!');
    }

    public function hapus_kategori_konten($kd_kategori_konten){
        $kategori_konten = KategoriKonten::findOrFail($kd_kategori_konten);
        $kategori_konten->delete($kategori_konten);

        return redirect('/admin/dataKonten/kategoriKonten')->with('alert danger', 'Kategori berhasil dihapus!');
    }

    public function konten(){

        $konten = Konten::orderBy('created_at', 'desc')->get();
        $kategori_konten = KategoriKonten::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaKonten', compact('konten','kategori_konten', 'i'));
        }
    }

    public function tambah_konten(Request $request){
        $this->validate($request, [
            'judul_konten' => '|unique:konten',
            'tgl_rilis' => '|max:10',
        ]);

        try{
            //Upload foto ke cloudinary
            $foto = $request->foto;
            Cloudder::upload($foto);
            $url_foto= Cloudder::getPublicId();
        }catch(Exception $e){
            return redirect('/admin/dataKonten/konten')->with('alert danger', $e);
        }   

        $konten = new Konten();
        $konten->judul_konten = $request->judul_konten;
        $konten->isi_konten = $request->isi_konten;
        $konten->kd_kategori = $request->kd_kategori_konten;
        $konten->foto = $url_foto;
        $konten->tgl_rilis = $request->tgl_rilis;
        $konten->save();

        return redirect('/admin/dataKonten/konten')->with('alert success', 'Konten berhasil ditambahkan!');
    }

    public function hapus_konten($kd_konten){
        $konten = Konten::findOrFail($kd_konten);
        $foto = Konten::where('kd_konten', $kd_konten)->value('foto');
        Cloudder::destroy($foto);
        $konten->delete($konten);

        return redirect('/admin/dataKonten/konten')->with('alert danger', 'Konten berhasil dihapus!');
    }

    public function ubah_konten(Request $request){
        $this->validate($request, [
            'tgl_rilis' => '|max:10',
        ]);

        if($request->foto != null){

            try{
                //Upload foto ke cloudinary
                $foto_old = Konten::where('kd_konten', $request->kd_konten)->value('foto');
                Cloudder::destroy($foto_old);
                $foto = $request->foto;
                Cloudder::upload($foto);
                $url_foto= Cloudder::getPublicId();
            }catch(Exception $e){
                return redirect('/admin/dataKonten/konten')->with('alert danger', $e);
            }   
    
            $konten = Konten::findOrFail($request->kd_konten);
            $konten->judul_konten = $request->judul_konten;
            $konten->isi_konten = $request->isi_konten;
            $konten->kd_kategori = $request->kd_kategori_konten;
            $konten->foto = $url_foto;
            $konten->tgl_rilis = $request->tgl_rilis2;
            $konten->save();

            return redirect('/admin/dataKonten/konten')->with('alert success', 'Konten berhasil diubah!');

        }else{

            $konten = Konten::findOrFail($request->kd_konten);
            $konten->judul_konten = $request->judul_konten;
            $konten->isi_konten = $request->isi_konten;
            $konten->kd_kategori = $request->kd_kategori_konten;
            $konten->tgl_rilis = $request->tgl_rilis2;
            $konten->save();

            return redirect('/admin/dataKonten/konten')->with('alert success', 'Konten berhasil diubah!');
        }
    }

    public function link_dinas(Request $request){
        $link = Link::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaLinkDinas', compact('link', 'i'));
        }
    }

    public function tambah_link_dinas(Request $request){
        $this->validate($request, [
            'link' => '|max:191',
            'nama_dinas_terkait' => '|unique:link|max:50',
        ]);

        $link = new Link();
        $link->link = $request->link;
        $link->nama_dinas_terkait = $request->nama_dinas_terkait;
        $link->save();

        return redirect('/admin/dataKonten/link')->with('alert success', 'Link berhasil ditambahkan!');
    }

    public function ubah_link_dinas(Request $request){
        $this->validate($request, [
            'link' => '|max:191',
            'nama_dinas_terkait' => '|max:50',
        ]);

        $link = Link::findOrFail($request->kd_link);
        $link->link = $request->link;
        $link->nama_dinas_terkait = $request->nama_dinas_terkait;
        $link->save();

        return redirect('/admin/dataKonten/link')->with('alert success', 'Link berhasil diubah!');
    }

    public function hapus_link_dinas($kd_link){
        $link = Link::findOrFail($kd_link);
        $link->delete($link);

        return redirect('/admin/dataKonten/link')->with('alert danger', 'Link berhasil dihapus!');
    }

    public function galeri(){
        $galeri = Galeri::all();
        $media = Media::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaGaleri', compact('galeri', 'media', 'i'));
        }
    }

    public function tambah_galeri(Request $request){
        try{
            for($i=0; $i<count($request->url_galeri); $i++){
                //Upload foto ke cloudinary
                Cloudder::upload($request->url_galeri[$i]);
                $url= Cloudder::getPublicId();
                $galeri = new Galeri();
                $galeri->url_galeri = $url;
                $galeri->kd_media = $request->kd_media;
                $galeri->save();
            }
            return redirect('/admin/dataKonten/galeri')->with('alert success', "File berhasil ditambahkan!");
        }catch(Exception $e){
            return redirect('/admin/dataKonten/galeri')->with('alert danger', $e);
        }  
    }

    public function hapus_galeri($kd_galeri, $url_galeri){
        try{
            $galeri = Galeri::findOrfail($kd_galeri);
            $galeri->delete($kd_galeri);
            Cloudder::destroy($url_galeri);
            return redirect('/admin/dataKonten/galeri')->with('alert success', "File berhasil dihapus!");
        }catch(Exception $e){
            return redirect('/admin/dataKonten/galeri')->with('alert danger', $e);
        }
    }

    public function profil(){
        $profil = Profil::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaProfilDinas', compact('profil', 'i'));
        }
    }

    public function tambah_profil(Request $request){
        $this->validate($request, [
            'alamat' => '|max:255',
            'kontak' => '|max:255',
            'email' => '|max:255',
        ]);

        try{
            //Upload foto ke cloudinary
            $visi_misi = $request->visi_misi;
            Cloudder::upload($visi_misi);
            $url_visi_misi= Cloudder::getPublicId();

            //Upload foto ke cloudinary
            $profil_lembaga = $request->profil_lembaga;
            Cloudder::upload($profil_lembaga);
            $url_profil_lembaga= Cloudder::getPublicId();
        }catch(Exception $e){
            return redirect('/admin/dataKonten/profil')->with('alert danger', $e);
        }    

        $profil = new Profil();
        $profil->kd_profil = $request->kd_profil;
        $profil->visi_misi = $url_visi_misi;
        $profil->profil_lembaga = $url_profil_lembaga;
        $profil->email = $request->email;
        $profil->kontak = $request->kontak;
        $profil->alamat = $request->alamat;
        $profil->save();

        return redirect('/admin/dataKonten/profil')->with('alert success', 'Profil berhasil ditambahkan!');
    }


    public function ubah_profil(Request $request){
        $this->validate($request, [
            'alamat' => '|max:255',
            'kontak' => '|max:255',
            'email' => '|max:255',
        ]);

        if($request->visi_misi!=null && $request->profil_lembaga==null){

            try{
                //Upload foto ke cloudinary
                $visi_misi_old = Profil::where('kd_profil', $request->kd_profil)->value('visi_misi');
                Cloudder::destroy($visi_misi_old);
                $visi_misi = $request->visi_misi;
                Cloudder::upload($visi_misi);
                $url_visi_misi= Cloudder::getPublicId();
            }catch(Exception $e){
                return redirect('/admin/dataKonten/profil')->with('alert danger', $e);
            } 

            $profil = Profil::findOrFail($request->kd_profil);
            $profil->kd_profil = $request->kd_profil;
            $profil->visi_misi = $url_visi_misi;
            $profil->email = $request->email;
            $profil->kontak = $request->kontak;
            $profil->alamat = $request->alamat;
            $profil->save();

            return redirect('/admin/dataKonten/profil')->with('alert success', 'Profil berhasil diubah!');

        }elseif($request->profil_lembaga!=null && $request->visi_misi==null){

            try{
                //Upload foto ke cloudinary
                $profil_lembaga_old = Profil::where('kd_profil', $request->kd_profil)->value('profil_lembaga');
                Cloudder::destroy($profil_lembaga_old);
                $profil_lembaga = $request->profil_lembaga;
                Cloudder::upload($profil_lembaga);
                $url_profil_lembaga= Cloudder::getPublicId();
            }catch(Exception $e){
                return redirect('/admin/dataKonten/profil')->with('alert danger', $e);
            }
            
            $profil = Profil::findOrFail($request->kd_profil);
            $profil->kd_profil = $request->kd_profil;
            $profil->profil_lembaga = $url_profil_lembaga;
            $profil->email = $request->email;
            $profil->kontak = $request->kontak;
            $profil->alamat = $request->alamat;
            $profil->save();

            return redirect('/admin/dataKonten/profil')->with('alert success', 'Profil berhasil diubah!');

        }elseif($request->profil_lembaga!=null && $request->visi_misi!=null){

            try{
                //Upload foto ke cloudinary
                $visi_misi_old = Profil::where('kd_profil', $request->kd_profil)->value('visi_misi');
                Cloudder::destroy($visi_misi_old);
                $visi_misi = $request->visi_misi;
                Cloudder::upload($visi_misi);
                $url_visi_misi= Cloudder::getPublicId();
    
                //Upload foto ke cloudinary
                $profil_lembaga_old = Profil::where('kd_profil', $request->kd_profil)->value('profil_lembaga');
                Cloudder::destroy($profil_lembaga_old);
                $profil_lembaga = $request->profil_lembaga;
                Cloudder::upload($profil_lembaga);
                $url_profil_lembaga= Cloudder::getPublicId();
            }catch(Exception $e){
                return redirect('/admin/dataKonten/profil')->with('alert danger', $e);
            }

            $profil = Profil::findOrFail($request->kd_profil);
            $profil->kd_profil = $request->kd_profil;
            $profil->visi_misi = $url_visi_misi;
            $profil->profil_lembaga = $url_profil_lembaga;
            $profil->email = $request->email;
            $profil->kontak = $request->kontak;
            $profil->alamat = $request->alamat;
            $profil->save();
    
            return redirect('/admin/dataKonten/profil')->with('alert success', 'Profil berhasil diubah!');

        }else {
            $profil = Profil::findOrFail($request->kd_profil);
            $profil->kd_profil = $request->kd_profil;
            $profil->email = $request->email;
            $profil->kontak = $request->kontak;
            $profil->alamat = $request->alamat;
            $profil->save();
    
            return redirect('/admin/dataKonten/profil')->with('alert success', 'Profil berhasil diubah!');
        }  
    }

    public function hapus_profil($kd_profil){
        $profil = Profil::findOrFail($kd_profil);

        $visi_misi = Profil::where('kd_profil', $kd_profil)->value('visi_misi');
        Cloudder::destroy($visi_misi);

        $profil_lembaga = Profil::where('kd_profil', $kd_profil)->value('profil_lembaga');
        Cloudder::destroy($profil_lembaga);

        $profil->delete($profil);

        return redirect('/admin/dataKonten/profil')->with('alert danger', 'Profil berhasil dihapus!');
    }
}
