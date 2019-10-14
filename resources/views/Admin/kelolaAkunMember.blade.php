@extends('Admin/masterAdmin')

@section('judul_tab', 'AkunMember-AdminBLK')
    
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
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahKelas"><i class="fa fa-plus-square"></i>
                                    Tambah Akun
                                    </button>
                                </div>

                                <!-- Modal Tambah Data-->

                                <div class="modal fade" id="tambahKelas" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="mediumModalLabel">Tambah Kelas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/datasiswa/kelas/tambahKelas') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pengguna</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="number" id="kd_pengguna" name="kd_pengguna" placeholder="Masukkan ID Kelas " class="form-control" 
                                                            @if($member->count()>0)
                                                                value="{{App\Member::all()->last()->kd_pengguna+1}}" 
                                                            @else
                                                                value="00000000001" 
                                                            @endif required>
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
                                                            <input type="number" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" required>
                                                            <small class="form-text text-muted">Tuliskan nama lengkap!</small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="id_jenjang" class=" form-control-label">Tempat Lahir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="tempat_lahir" id="tempat_lahir" class="form-control">
                                                                <option value="">---Pilih Tempat Lahir---</option>
                                                                @foreach($ac->rajaongkir->results as $key)
                                                                <option value="{{$key->type." ".$key->city_name}}">{{$key->type." ".$key->city_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Pendidikan Terakhir</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                                                                <option value="">---Pilih Pendidikan Terakhir---</option>
                                                                <option value="SD">SD</option>
                                                                <option value="SMP">SMP</option>
                                                                <option value="SMA">SMA</option>
                                                                <option value="D3">D3</option>
                                                                <option value="S1">S1</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat Lengkap</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan Alamat Lengkap" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Provinsi</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="provinsi" id="provinsi" class="form-control">
                                                                <option value="">---Pilih Provinsi---</option>
                                                                @foreach($ap->rajaongkir->results as $key)
                                                                <option value="{{$key->province_id}}">{{$key->province}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kabupatan/Kota</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kabupaten_kota" id="kabupaten_kota" class="form-control">
                                                                <option value="">---Pilih Kabupaten/Kota---</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kabupatan/Kota</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kabupaten_kota" id="kabupaten_kota" class="form-control">
                                                                <option value="">---Pilih Kabupaten/Kota---</option>
                                                            </select>
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

                                <br>

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenjang</th>
                                            <th>Angkatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        
        <script language="JavaScript" type="text/JavaScript">
            $('#provinsi').on('change', function(e){
            console.log(e);
            var prov_id = e.target.value; 

            //ajax

            $.get('/ajax-kota/' + prov_id, function(data){

                $('#kabupaten_kota').empty();

                $.each(data, function(index, kotaObj){
                $('#kabupaten_kota').append('<option value="'+kotaObj.id+'">'+kotaObj.type+" "+kotaObj.nama+'</option>');
                });
            });
            });
        </script>

@endsection

