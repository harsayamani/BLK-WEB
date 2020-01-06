<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Gelombang;
use App\ProgramPelatihan;
use App\SkemaPelatihan;
use App\PendaftaranProgram;
use App\Member;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;
use Kreait\Firebase\Messaging\Notification;
use Illuminate\Support\Facades\DB as DB;

class PelatihanController extends Controller
{
    public function gelombang(){
        $gelombang = Gelombang::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaGelombangPendaftaran', compact('gelombang', 'i'));
        }
    }

    public function tambah_gelombang(Request $request){

        $this->validate($request, [
            'kd_gelombang' => '|unique:gelombang|numeric|regex:/^([1-9][0-9]+)/',
            'nama_gelombang' => '|unique:gelombang|max:30',
        ]);

        $gelombang = new Gelombang();
        $gelombang->kd_gelombang= $request->kd_gelombang;
        $gelombang->nama_gelombang = $request->nama_gelombang;
        $gelombang->save();

        return redirect('/admin/dataPelatihan/gelombang')->with('alert success', 'Gelombang berhasil ditambahkan!');
    }

    public function ubah_gelombang(Request $request){

        $this->validate($request, [
            'nama_gelombang' => '|max:30',
        ]);

        $gelombang = Gelombang::findOrFail($request->kd_gelombang);
        $gelombang->kd_gelombang= $request->kd_gelombang;
        $gelombang->nama_gelombang = $request->nama_gelombang;
        $gelombang->save();

        return redirect('/admin/dataPelatihan/gelombang')->with('alert success', 'Gelombang berhasil diubah!');
    }

    public function hapus_gelombang($kd_gelombang){
        $gelombang = Gelombang::findOrFail($kd_gelombang);
        $gelombang->delete($gelombang);

        return redirect('/admin/dataPelatihan/gelombang')->with('alert danger', 'Gelombang berhasil dihapus!');
    }

    public function program(){
        $program = ProgramPelatihan::all();
        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaProgramPelatihan', compact('program', 'i'));
        }
    }

    public function tambah_program(Request $request){

        $this->validate($request, [
            'kd_program' => '|unique:program_pelatihan|numeric|regex:/^([1-9][0-9]+)/',
            'nama_program' => '|unique:program_pelatihan|max:50',
        ]);

        $program = new ProgramPelatihan();
        $program->kd_program= $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->detail_program = $request->detail_program;
        $program->save();

        return redirect('/admin/dataPelatihan/program')->with('alert success', 'Program berhasil ditambahkan!');
    }

    public function ubah_program(Request $request){

        $this->validate($request, [
            'nama_program' => '|max:50',
        ]);

        $program = ProgramPelatihan::findOrFail($request->kd_program);
        $program->kd_program= $request->kd_program;
        $program->nama_program = $request->nama_program;
        $program->detail_program = $request->detail_program;
        $program->save();

        return redirect('/admin/dataPelatihan/program')->with('alert success', 'Program berhasil diubah!');
    }

    public function hapus_program($kd_program){
        $program = ProgramPelatihan::findOrFail($kd_program);
        $program->delete($program);

        return redirect('/admin/dataPelatihan/program')->with('alert danger', 'Program berhasil dihapus!');
    }

    public function skema(){
        $skema = SkemaPelatihan::all();
        $program = ProgramPelatihan::all();
        $gelombang = Gelombang::all();

        $i = 0;
        // dd($program);

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaSkemaPelatihan', compact('skema', 'gelombang', 'program', 'i'));
        }
    }

    public function tambah_skema(Request $request){

        $this->validate($request, [
            'kd_skema' => '|unique:skema_pelatihan|numeric|regex:/^([1-9][0-9]+)/',
            'kuota' => '|numeric|regex:/^([1-9][0-9]+)/',
        ]);

        $skema = new SkemaPelatihan();
        $skema->kd_skema= $request->kd_skema;
        $skema->kd_gelombang = $request->kd_gelombang;
        $skema->kd_program = $request->kd_program;
        $skema->tgl_awal_pendaftaran = $request->tgl_awal_pendaftaran;
        $skema->tgl_akhir_pendaftaran = $request->tgl_akhir_pendaftaran;
        $skema->tgl_seleksi = $request->tgl_seleksi;
        $skema->tgl_awal_pelaksanaan = $request->tgl_awal_pelaksanaan;
        $skema->tgl_akhir_pelaksanaan = $request->tgl_akhir_pelaksanaan;
        $skema->kuota = $request->kuota;

        $skema->save();

        return redirect('/admin/dataPelatihan/skema')->with('alert success', 'Skema berhasil ditambahkan!');
    }

    public function ubah_skema(Request $request){

        $this->validate($request, [
            'kd_skema' => '|numeric|regex:/^([1-9][0-9]+)/',
            'kuota' => '|numeric|regex:/^([1-9][0-9]+)/',
        ]);

        $skema = SkemaPelatihan::findOrFail($request->kd_skema);
        $skema->kd_skema= $request->kd_skema;
        $skema->kd_gelombang = $request->kd_gelombang;
        $skema->kd_program = $request->kd_program;
        $skema->tgl_awal_pendaftaran = $request->tgl_awal_pendaftaran2;
        $skema->tgl_akhir_pendaftaran = $request->tgl_akhir_pendaftaran2;
        $skema->tgl_seleksi = $request->tgl_seleksi2;
        $skema->tgl_awal_pelaksanaan = $request->tgl_awal_pelaksanaan2;
        $skema->tgl_akhir_pelaksanaan = $request->tgl_akhir_pelaksanaan2;
        $skema->kuota = $request->kuota;
        $skema->save();

        return redirect('/admin/dataPelatihan/skema')->with('alert success', 'Skema berhasil diubah!');
    }

    public function hapus_skema($kd_skema){
        $skema = SkemaPelatihan::findOrFail($kd_skema);
        $skema->delete($skema);

        return redirect('/admin/dataPelatihan/skema')->with('alert danger', 'Skema berhasil dihapus!');
    }

    public function pendaftaran(){
        $skema = SkemaPelatihan::all();
        $member = Member::all();
        $pendaftaran = PendaftaranProgram::orderBy('kd_skema', 'asc')->get();

        $i = 0;

        if(!Session::get('loginAdmin')){
            return redirect('/admin/login')->with('alert', 'Anda harus login terlebih dahulu');
        }else{
            return view('Admin/kelolaPendaftaranPelatihan', compact('pendaftaran', 'skema', 'member', 'i'));
        }
    }

    public function tambah_pendaftaran(Request $request){
        $this->validate($request, [
            'kd_pendaftaran' => '|unique:pendaftaran_program|numeric|regex:/^([1-9][0-9]+)/',
            'kd_pengguna' => '|unique:pendaftaran_program',
        ]);

        $pendaftaran = new PendaftaranProgram();
        $pendaftaran->kd_pendaftaran = $request->kd_pendaftaran;
        $pendaftaran->kd_skema = $request->kd_skema;
        $pendaftaran->kd_pengguna = $request->kd_pengguna;

        $kuota_skema = SkemaPelatihan::where('kd_skema', $request->kd_skema)->value('kuota');
        $count_daftar_skema = PendaftaranProgram::where('kd_skema', $request->kd_skema)->count();

        // instance factory
        $factory = (new Factory)
            ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
            ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

        $messaging = $factory->createMessaging();

        $token = DB::table('member')
                 ->where('kd_pengguna', $request->kd_pengguna)
                 ->value('token');

        $nama = DB::table('member')
                ->where('kd_pengguna', $request->kd_pengguna)
                ->value('nama_lengkap');
        // end instance factory

        if($count_daftar_skema < $kuota_skema){
            $pendaftaran->status = 1;
            $pendaftaran->save();

            if($token != ""){
                // send notification
                if($pendaftaran->save()){
                    $header = "Peserta Pelatihan BLK Indramayu";
                    $judul  = "Selamat " . $nama . ", anda sudah diterima menjadi peserta pelatihan!";

                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($header, $judul))
                        ->withData([
                            'jenis' => '5'
                        ]);

                    $messaging->send($message);
                }
            }

            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert success', 'Pendaftaran berhasil. Anda sudah diterima menjadi peserta pelatihan!');
        }elseif ($count_daftar_skema >= $kuota_skema){
            $pendaftaran->status = 0;
            $pendaftaran->save();

            if($token != ""){
                // send notification
                if($pendaftaran->save()){
                    $header = "Peserta Pelatihan BLK Indramayu";
                    $judul  = $nama . ", dikarenakan kuota pelatihan sudah terpenuhi, maka anda masuk daftar tunggu!";
    
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($header, $judul))
                        ->withData([
                            'jenis' => '5'
                        ]);
    
                    $messaging->send($message);
                }
            }
        
            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert warning', 'Pendaftaran berhasil. Dikarenakan kuota pelatihan sudah terpenuhi, maka anda masuk daftar tunggu!');
        }
    }

    public function ubah_pendaftaran(Request $request){
        $this->validate($request, [
            'kd_pendaftaran' => '|numeric|regex:/^([1-9][0-9]+)/',
            'kd_pengguna' => '|numeric|regex:/^([1-9][0-9]+)/',
        ]);

        $pendaftaran = PendaftaranProgram::findOrFail($request->kd_pendaftaran);
        $pendaftaran->kd_pendaftaran = $request->kd_pendaftaran;
        $pendaftaran->kd_skema = $request->kd_skema;
        $pendaftaran->kd_pengguna = $request->kd_pengguna;

        $kuota_skema = SkemaPelatihan::where('kd_skema', $request->kd_skema)->value('kuota');
        $count_daftar_skema = PendaftaranProgram::where('kd_skema', $request->kd_skema)->count();

        // instance factory
        $factory = (new Factory)
            ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
            ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

        $messaging = $factory->createMessaging();

        $token = DB::table('member')
                 ->where('kd_pengguna', $request->kd_pengguna)
                 ->value('token');

        $nama = DB::table('member')
                ->where('kd_pengguna', $request->kd_pengguna)
                ->value('nama_lengkap');
        // end instance factory

        if($count_daftar_skema < $kuota_skema){
            $pendaftaran->status = 1;
            $pendaftaran->save();

            if($token != ""){
                // send notification
                if($pendaftaran->save()){
                    $header = "Peserta Pelatihan BLK Indramayu";
                    $judul  = "Selamat " . $nama . ", anda sudah diterima menjadi peserta pelatihan!";

                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($header, $judul))
                        ->withData([
                            'jenis' => '5'
                        ]);

                    $messaging->send($message);
                }
            }
            
            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert success', 'Pendaftaran berhasil diubah. Anda sudah diterima menjadi peserta pelatihan!');
        }elseif ($count_daftar_skema >= $kuota_skema){
            $pendaftaran->status = 0;
            $pendaftaran->save();

            if($token != ""){
                // send notification
                if($pendaftaran->save()){
                    $header = "Peserta Pelatihan BLK Indramayu";
                    $judul  = $nama . ", dikarenakan kuota pelatihan sudah terpenuhi, maka anda masuk daftar tunggu!";
    
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($header, $judul))
                        ->withData([
                            'jenis' => '5'
                        ]);
    
                    $messaging->send($message);
                }
            }
        
            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert warning', 'Pendaftaran berhasil diubah. Dikarenakan kuota pelatihan sudah terpenuhi, maka anda masuk daftar tunggu!');
        }
    }

    public function hapus_pendaftaran($kd_pendaftaran){
        $pendaftaran = PendaftaranProgram::findOrFail($kd_pendaftaran);

        $status = PendaftaranProgram::where('kd_pendaftaran', $kd_pendaftaran)->value('status');
        $kd_skema = PendaftaranProgram::where('kd_pendaftaran', $kd_pendaftaran)->value('kd_skema');
        $list_pendaftar_count = PendaftaranProgram::where('kd_skema', $kd_skema)->count();
        $kuota_skema = SkemaPelatihan::where('kd_skema', $kd_skema)->value('kuota');
        $kd_pengguna = PendaftaranProgram::where('kd_pendaftaran', $kd_pendaftaran)->value('kd_pengguna');
        $nama = Member::where('kd_pengguna', $kd_pengguna)->value('nama_lengkap');

        // instance factory
        $factory = (new Factory)
            ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
            ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

        $messaging = $factory->createMessaging();

        $token = DB::table('member')
                 ->where('kd_pengguna', $kd_pengguna)
                 ->value('token');
        // end instance factory

        if($status == 0 && $list_pendaftar_count < $kuota_skema){
            $peserta = PendaftaranProgram::where('kd_skema', $kd_skema)->where('status', 0)->first();
            $peserta->status = 1;
            $peserta->save();
            $pendaftaran->delete();

            if($token != ""){
                // send notification
                if($peserta->save()){
                    $header = "Peserta Pelatihan BLK Indramayu";
                    $judul  = "Selamat " . $nama . ", anda sudah diterima menjadi peserta pelatihan!";
    
                    $message = CloudMessage::withTarget('token', $token)
                        ->withNotification(Notification::create($header, $judul))
                        ->withData([
                            'jenis' => '5'
                        ]);
    
                    $messaging->send($message);
                }
            }
        
            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert danger', 'Pendaftaran berhasil dihapus!');
        }else{
            $pendaftaran->delete();
            return redirect('/admin/dataPelatihan/pendaftaran')->with('alert danger', 'Pendaftaran berhasil dihapus!');
        }
    }

    public function konfirmasi_tidak_lulus($kd_pendaftaran){
        $pendaftaran = PendaftaranProgram::where('kd_pendaftaran', $kd_pendaftaran)->first();
        $pendaftaran->status = 3;
        $pendaftaran->save();

        $nama_lengkap = Member::where('kd_pengguna', $pendaftaran->kd_pengguna)->value('nama_lengkap');

        // instance factory
        $factory = (new Factory)
            ->withServiceAccount('../blk-indramayu-firebase-adminsdk-440mz-4541ed6401.json')
            ->withDatabaseUri('https://blk-indramayu.firebaseio.com');

        $messaging = $factory->createMessaging();

        $token = DB::table('member')
                 ->where('kd_pengguna', $pendaftaran->kd_pengguna)
                 ->value('token');
        // end instance factory

        if($token != ""){
            // send notification
            if($pendaftaran->save()){
                $header = "Peserta Pelatihan BLK Indramayu";
                $judul  = $nama_lengkap . ", hasil pelatihan anda sudah keluar!";

                $message = CloudMessage::withTarget('token', $token)
                    ->withNotification(Notification::create($header, $judul))
                    ->withData([
                        'jenis' => '5'
                    ]);

                $messaging->send($message);
            }
        }

        return redirect('/admin/dataPelatihan/pendaftaran')->with('alert danger', 'Konfirmasi peserta '.$nama_lengkap.' tidak lulus');
    }
}
