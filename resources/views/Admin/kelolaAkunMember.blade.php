@extends('Admin/masterAdmin')

@section('judul_tab', 'Akun Member - AdminBLK')
    
@section('active_menu_kelola_akun', 'active')

@section('content')

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Akun Member</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Member</a></li>
                                    <li class="active">Akun Member</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Kelola Akun Member</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahAkun"><i class="fa fa-plus-square"></i>
                                    Tambah Akun
                                    </button>
                                </div>

                                <!-- Modal Tambah Akun-->

                                <div class="modal fade" id="tambahAkun" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Akun</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataMember/akunMember/tambahAkun') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pengguna</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="number" id="kd_pengguna" name="kd_pengguna" placeholder="Masukkan ID Kelas " class="form-control" 
                                                            @if($member->count()>0)
                                                                value="{{App\Member::all()->last()->kd_pengguna+1}}" 
                                                            @else
                                                                value="1000000001" 
                                                            @endif required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI MEMBER</strong></label>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nomor KTP</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="nomor_ktp" name="nomor_ktp" placeholder="Masukkan Nomor KTP" class="form-control" required>
                                                            <small class="form-text text-muted">Tuliskan nomor KTP!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" required>
                                                            <small class="form-text text-muted">Tuliskan nama lengkap!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Jenis Kelamin</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                                <option value="">---Pilih Jenis Kelamin---</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select class="form-control js-example-basic-single" name="tempat_lahir" id="tempat_lahir" style="width:100%">
                                                                <option value="">---Pilih Tempat Lahir---</option>
                                                                @foreach($kota as $city)
                                                                <option value="{{$city->id}}">{{$city->type." ".$city->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Pendidikan Terakhir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                                                <option value="">---Pilih Pendidikan Terakhir---</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTS">SMP/MTS</option>
                                                                <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                                                <option value="D3">D3</option>
                                                                <option value="D4">D4</option>
                                                                <option value="S1">S1</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tahun Ijazah</label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="number" id="thn_ijazah" name="thn_ijazah" placeholder="Masukkan Tahun Ijazah" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Provinsi</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="provinsi" id="provinsi" class="form-control js-example-basic-single" style="width:100%">
                                                                <option value="">---Pilih Provinsi---</option>
                                                                @foreach($provinsi as $province)
                                                                <option value="{{$province->id}}">{{$province->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kabupatan/Kota</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kabupaten_kota" id="kabupaten_kota" data-dependent="kodepos" class="form-control">
                                                                <option value="">---Pilih Kabupaten/Kota---</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat Lengkap</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan Alamat Lengkap" class="form-control" required> </textarea>
                                                            <small class="form-text text-muted">Tuliskan alamat lengkap!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kode Pos</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kodepos" name="kodepos" placeholder="" class="form-control" readonly>
                                                        </div>
                                                    </div>
                
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nomor Kontak</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nomor_kontak" name="nomor_kontak" placeholder="Masukkan nomor kontak" class="form-control" required value="+62">
                                                            <small class="form-text text-muted">Tuliskan nomor kontak!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI PAKAIAN</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">Ukuran Baju</label>
                                                        </div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="radio">
                                                                    <label for="s" class="form-check-label ">
                                                                        <input type="radio" id="s" name="ukuran_baju" value="S" class="form-check-input">S
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="m" class="form-check-label ">
                                                                        <input type="radio" id="m" name="ukuran_baju" value="M" class="form-check-input">M
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="l" class="form-check-label ">
                                                                        <input type="radio" id="l" name="ukuran_baju" value="L" class="form-check-input">L
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="xl" class="form-check-label ">
                                                                        <input type="radio" id="xl" name="ukuran_baju" value="XL" class="form-check-input">XL
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="xxl" class="form-check-label ">
                                                                        <input type="radio" id="xxl" name="ukuran_baju" value="XXL" class="form-check-input">XXL
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="lainnya" class="form-check-label ">
                                                                        <input type="text" id="ukuran_baju_lain" name="ukuran_baju_lain" placeholder="Lainnya" class="form-control">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">Ukuran Sepatu</label>
                                                        </div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu1" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu1" name="ukuran_sepatu" value="36" class="form-check-input">36
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu2" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu2" name="ukuran_sepatu" value="37" class="form-check-input">37
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu3" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu3" name="ukuran_sepatu" value="38" class="form-check-input">38
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu4" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu4" name="ukuran_sepatu" value="39" class="form-check-input">39
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu5" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu5" name="ukuran_sepatu" value="40" class="form-check-input">40
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu6" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu6" name="ukuran_sepatu" value="41" class="form-check-input">41
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu7" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu7" name="ukuran_sepatu" value="42" class="form-check-input">42
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu8" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu8" name="ukuran_sepatu" value="43" class="form-check-input">43
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu_lain" class="form-check-label ">
                                                                        <input type="text" id="ukuran_sepatu_lain" name="ukuran_sepatu_lain" placeholder="Lainnya" class="form-control">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI AKUN</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Username</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="username" name="username" placeholder="Masukkan Username" class="form-control" value="{{str_random(5)}}" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Password</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="password" id="password" name="password" value="{{str_random(8)}}" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="email" placeholder="Masukkan email" name="email" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Ubah Akun -->
                                <div class="modal fade" id="ubahAkun" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Akun</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataMember/akunMember/ubahAkun') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pengguna</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="number" id="kd_pengguna" name="kd_pengguna" placeholder="Masukkan ID Kelas " class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI MEMBER</strong></label>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nomor KTP</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="nomor_ktp" name="nomor_ktp" placeholder="Masukkan Nomor KTP" class="form-control" required>
                                                            <small class="form-text text-muted">Tuliskan nomor KTP!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" required>
                                                            <small class="form-text text-muted">Tuliskan nama lengkap!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Jenis Kelamin</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                                                <option value="">---Pilih Jenis Kelamin---</option>
                                                                <option value="L">Laki-Laki</option>
                                                                <option value="P">Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="id_jenjang" class=" form-control-label">Tempat Lahir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="tempat_lahir" id="tempat_lahir" class="form-control">
                                                                <option value="">---Pilih Tempat Lahir---</option>
                                                                @foreach($kota as $city)
                                                                <option value="{{$city->id}}">{{$city->type." ".$city->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_lahir2" name="tgl_lahir2" placeholder="Masukkan Tanggal Lahir" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Pendidikan Terakhir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                                                <option value="">---Pilih Pendidikan Terakhir---</option>
                                                                <option value="SD/MI">SD/MI</option>
                                                                <option value="SMP/MTS">SMP/MTS</option>
                                                                <option value="SMA/MA/SMK">SMA/MA/SMK</option>
                                                                <option value="D3">D3</option>
                                                                <option value="D4">D4</option>
                                                                <option value="S1">S1</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tahun Ijazah</label>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <input type="number" id="thn_ijazah" name="thn_ijazah" placeholder="Masukkan Tahun Ijazah" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Provinsi</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="provinsi2" id="provinsi2" class="form-control">
                                                                <option value="">---Pilih Provinsi---</option>
                                                                @foreach($provinsi as $province)
                                                                <option value="{{$province->id}}">{{$province->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kabupatan/Kota</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kabupaten_kota2" id="kabupaten_kota2" data-dependent="kodepos" class="form-control">
                                                                <option value="">---Pilih Kabupaten/Kota---</option>
                                                                @foreach($kota as $city)
                                                                <option value="{{$city->id}}">{{$city->type." ".$city->nama}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat Lengkap</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan Alamat Lengkap" class="form-control" required> </textarea>
                                                            <small class="form-text text-muted">Tuliskan alamat lengkap!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kode Pos</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kodepos2" name="kodepos2" placeholder="" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nomor Kontak</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nomor_kontak" name="nomor_kontak" placeholder="Masukkan nomor kontak" class="form-control" required value="+62">
                                                            <small class="form-text text-muted">Tuliskan nomor kontak!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI PAKAIAN</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">Ukuran Baju</label>
                                                        </div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="radio">
                                                                    <label for="s" class="form-check-label ">
                                                                        <input type="radio" id="s" name="ukuran_baju" value="S" class="form-check-input">S
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="m" class="form-check-label ">
                                                                        <input type="radio" id="m" name="ukuran_baju" value="M" class="form-check-input">M
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="l" class="form-check-label ">
                                                                        <input type="radio" id="l" name="ukuran_baju" value="L" class="form-check-input">L
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="xl" class="form-check-label ">
                                                                        <input type="radio" id="xl" name="ukuran_baju" value="XL" class="form-check-input">XL
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="xxl" class="form-check-label ">
                                                                        <input type="radio" id="xxl" name="ukuran_baju" value="XXL" class="form-check-input">XXL
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="lainnya" class="form-check-label ">
                                                                        <input type="text" id="ukuran_baju_lain" name="ukuran_baju_lain" placeholder="Lainnya" class="form-control">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label class=" form-control-label">Ukuran Sepatu</label>
                                                        </div>
                                                        <div class="col col-md-9">
                                                            <div class="form-check">
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu1" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu1" name="ukuran_sepatu" value="36" class="form-check-input">36
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu2" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu2" name="ukuran_sepatu" value="37" class="form-check-input">37
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu3" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu3" name="ukuran_sepatu" value="38" class="form-check-input">38
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu4" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu4" name="ukuran_sepatu" value="39" class="form-check-input">39
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu5" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu5" name="ukuran_sepatu" value="40" class="form-check-input">40
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu6" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu6" name="ukuran_sepatu" value="41" class="form-check-input">41
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu7" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu7" name="ukuran_sepatu" value="42" class="form-check-input">42
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu8" class="form-check-label ">
                                                                        <input type="radio" id="ukuran_sepatu8" name="ukuran_sepatu" value="43" class="form-check-input">43
                                                                    </label>
                                                                </div>
                                                                <div class="radio">
                                                                    <label for="ukuran_sepatu_lain" class="form-check-label ">
                                                                        <input type="text" id="ukuran_sepatu_lain" name="ukuran_sepatu_lain" placeholder="Lainnya" class="form-control">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-12">
                                                            <label><strong>INFORMASI AKUN</strong></label>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Username</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="username" name="username" placeholder="Masukkan Username" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Password</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="password" id="password" name="password"  class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="email" placeholder="Masukkan email" name="email" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Ubah</button>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama Lengkap</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Provinsi</th>
                                            <th>Kabupaten/Kota</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($member as $member)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$member->nomor_ktp}}</td>
                                            <td>{{$member->nama_lengkap}}</td>
                                            <td>{{App\Cities::where('id', $member->tempat_lahir)->value('type')." ".App\Cities::where('id', $member->tempat_lahir)->value('nama').", ".$member->tgl_lahir}}</td>
                                            <td>{{App\Province::where('id', $member->provinsi)->value('nama')}}</td>
                                            <td>{{App\Cities::where('id', $member->kabupaten_kota)->value('type')." ".App\Cities::where('id', $member->kabupaten_kota)->value('nama')}}</td>
                                            <td>
                                            <button type="button" class="btn btn-success btn-sm" 
                                                data-target="#ubahAkun" 
                                                data-toggle="modal"
                                                data-kd_pengguna="{{$member->kd_pengguna}}"
                                                data-nomor_ktp="{{$member->nomor_ktp}}"
                                                data-nama_lengkap="{{$member->nama_lengkap}}"
                                                data-jenis_kelamin="{{$member->jenis_kelamin}}"
                                                data-tempat_lahir="{{$member->tempat_lahir}}"
                                                data-tgl_lahir="{{$member->tgl_lahir}}"
                                                data-pend_terakhir="{{$member->pend_terakhir}}"
                                                data-thn_ijazah="{{$member->thn_ijazah}}"
                                                data-alamat_lengkap="{{$member->alamat_lengkap}}"
                                                data-provinsi="{{$member->provinsi}}"
                                                data-kabupaten_kota="{{$member->kabupaten_kota}}"
                                                data-kodepos="{{$member->kodepos}}"
                                                data-nomor_kontak="{{$member->nomor_kontak}}"
                                                data-ukuran_baju="{{$member->ukuran_baju}}"
                                                data-ukuran_sepatu="{{$member->ukuran_sepatu}}"
                                                data-username="{{$member->username}}"
                                                data-password="{{$member->password}}"
                                                data-email="{{$member->email}}"
                                            >
                                                <i class="fa fa-edit"></i>&nbsp; 
                                                Ubah
                                            </button>
                                            <a href="/admin/dataMember/akunMember/hapusAkun/{{$member->kd_pengguna}}" type="button" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>&nbsp;
                                                Hapus
                                            </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script>
        $('.js-example-basic-single').select2({
            theme: "classic",
        });
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

    <script>
        $('#tgl_lahir').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_lahir2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>
        
    <script language="JavaScript" type="text/JavaScript">
        $('#provinsi').on('change', function(e){
        console.log(e);
        var prov_id = e.target.value; 

        //ajax

        $.get('/ajax-kota/' + prov_id, function(data){

            $('#kabupaten_kota').empty();

                $.each(data, function(index, kotaObj){
                    $('#kabupaten_kota').append('<option value="'+kotaObj.id+'" selected>'+kotaObj.type+" "+kotaObj.nama+'</option>');
                });
            });
        });
    </script>

    <script language="JavaScript" type="text/JavaScript">
        $('#provinsi2').on('change', function(e){
        console.log(e);
        var prov_id = e.target.value; 

        //ajax

        $.get('/ajax-kota/' + prov_id, function(data){

            $('#kabupaten_kota2').empty();

                $.each(data, function(index, kotaObj){
                    $('#kabupaten_kota2').append('<option value="'+kotaObj.id+'" selected>'+kotaObj.type+" "+kotaObj.nama+'</option>');
                });
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#kabupaten_kota').on('change', function(){
                $.ajax({
                    url: "/ajax-kodepos",
                    type:"POST",
                    data : {"_token": "{{ csrf_token() }}",
                    "id":$(this).val()},
                    dataType: "json",
                    success: function(res){
                        console.log(res.kodepos);
                        $('#kodepos').val(res.kodepos);
                    }
                })
            })

            // init
            $('#kabupaten_kota').change();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#kabupaten_kota2').on('change', function(){
                $.ajax({
                    url: "/ajax-kodepos",
                    type:"POST",
                    data : {"_token": "{{ csrf_token() }}",
                    "id":$(this).val()},
                    dataType: "json",
                    success: function(res){
                        console.log(res.kodepos);
                        $('#kodepos2').val(res.kodepos);
                    }
                })
              
            })

            // init
            $('#kabupaten_kota2').change();
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahAkun').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_pengguna = button.data('kd_pengguna');
              var nomor_ktp = button.data('nomor_ktp');
              var nama_lengkap = button.data('nama_lengkap');
              var jenis_kelamin =  button.data('jenis_kelamin');
              var tempat_lahir =  button.data('tempat_lahir');
              var pend_terakhir = button.data('pend_terakhir');
              var thn_ijazah = button.data('thn_ijazah');
              var tgl_lahir = button.data('tgl_lahir');
              var alamat_lengkap = button.data('alamat_lengkap');
              var provinsi = button.data('provinsi');
              var kabupaten_kota = button.data('kabupaten_kota');
              var kodepos = button.data('kodepos');
              var nomor_kontak = button.data('nomor_kontak');
              var ukuran_baju = button.data('ukuran_baju');
              var ukuran_sepatu = button.data('ukuran_sepatu');
              var username = button.data('username');
              var password = button.data('password');
              var email = button.data('email');
             
              var modal = $(this);
              modal.find('.modal-body #kd_pengguna').val(kd_pengguna);
              modal.find('.modal-body #nomor_ktp').val(nomor_ktp);
              modal.find('.modal-body #nama_lengkap ').val(nama_lengkap);
              modal.find('.modal-body #tempat_lahir').val(tempat_lahir);
              modal.find('.modal-body #tgl_lahir2').val(tgl_lahir);
              modal.find('.modal-body #jenis_kelamin').val(jenis_kelamin);
              modal.find('.modal-body #alamat_lengkap').val(alamat_lengkap);
              modal.find('.modal-body #pend_terakhir').val(pend_terakhir);
              modal.find('.modal-body #thn_ijazah').val(thn_ijazah);
              modal.find('.modal-body #provinsi2').val(provinsi);
              modal.find('.modal-body #kabupaten_kota2').val(kabupaten_kota);
              modal.find('.modal-body #kodepos2').val(kodepos);
              modal.find('.modal-body #nomor_kontak').val(nomor_kontak);
              modal.find('.modal-body #ukuran_baju_lain').val(ukuran_baju);
              modal.find('.modal-body #ukuran_sepatu_lain').val(ukuran_sepatu);
              modal.find('.modal-body #username').val(username);
              modal.find('.modal-body #password').val(password);
              modal.find('.modal-body #email').val(email);
            });
        }); 
    </script> 

@endsection

