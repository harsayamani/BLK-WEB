@extends('Admin/masterAdmin')

@section('judul_tab', 'Sertifikat-AdminBLK')
    
@section('active_menu_kelola_sertifikat', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Sertifikat</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Member</a></li>
                                    <li class="active">Sertifikat</li>
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
                                <strong class="card-title">Kelola Sertifikat</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahSertifikat"><i class="fa fa-plus-square"></i>
                                    Tambah Sertifikat
                                    </button>
                                </div>

                                <!-- Modal Tambah Sertifikat -->

                                <div class="modal fade" id="tambahSertifikat" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Sertifikat</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataMember/sertifikat/tambahSertifikat')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Sertifikasi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kd_sertifikat" name="kd_sertifikat" placeholder="Masukkan Kode Sertifikat " class="form-control" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Unggah Sertifikat</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="gambar_sertifikat" name="gambar_sertifikat" accept="image/*" class="form-control-file" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Member</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_pengguna" id="kd_pengguna" class="form-control">
                                                            <option value="">---Pilih Member---</option>
                                                            @foreach($member as $member)
                                                                <option value="{{$member->kd_pengguna}}">{{$member->no_ktp." ".$member->nama_lengkap}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="id_jenjang" class=" form-control-label">Program</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_program" id="kd_program" class="form-control">
                                                                <option value="">---Pilih Program---</option>
                                                                @foreach($program as $program)
                                                                <option value="{{$program->kd_program}}">{{$program->nama_program}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Terbit</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="text" id="tgl_terbit" name="tgl_terbit" placeholder="Masukkan Tanggal Terbit" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Kadaluarsa</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="text" id="tgl_kadaluarsa" name="tgl_kadaluarsa" placeholder="Masukkan Tanggal Kadaluarsa" class="form-control" required>
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

                                <!-- Modal Ubah Sertifikat -->
                                <div class="modal fade" id="ubahSertifikat" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Serifikat</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataMember/sertifikat/ubahSertifikat') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pengguna</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="number" id="kd_sertifikat" name="kd_sertifikat" placeholder="Masukkan ID Kelas " class="form-control" required>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Unggah Sertifikat</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="gambar_sertifikat" name="gambar_sertifikat" accept="image/*" class="form-control-file" required>
                                                            <small class="form-text text-muted" id="link_gambar" name="link_gambar"></small>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text_input" class=" form-control-label">Member</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_pengguna" id="kd_pengguna" class="form-control">
                                                                <option value="">---Pilih Member---</option>
                                                                @foreach($member2 as $member)
                                                                <option value="{{$member->kd_pengguna}}">{{$member->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Program</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_program" id="kd_program" class="form-control">
                                                                <option value="">---Pilih Program---</option>
                                                                @foreach($program2 as $program)
                                                                <option value="{{$program->kd_program}}">{{$program->nama_program}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Terbit</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="text" id="tgl_terbit2" name="tgl_terbit2" placeholder="Masukkan Tanggal Terbit" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Kadaluarsa</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input readonly type="text" id="tgl_kadaluarsa2" name="tgl_kadaluarsa2" placeholder="Masukkan Tanggal Kadaluarsa" class="form-control" required>
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
                                            <th>QR Code</th>
                                            <th>Kode Sertifikat</th>
                                            <th>Member</th>
                                            <th>Program</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($sertifikat as $sertifikat)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>
                                                <a href="/admin/dataMember/sertifikat/lembarPengesahan/{{$sertifikat->kd_sertifikat}}">
                                                    <i class="fa fa-qrcode"></i>&nbsp;
                                                </a>
                                            </td>
                                            <td>{{$sertifikat->kd_sertifikat}}</td>
                                            <td>{{App\Member::where('kd_pengguna', $sertifikat->kd_pengguna)->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', $sertifikat->kd_program)->value('nama_program')}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahSertifikat" 
                                                    data-toggle="modal"
                                                    data-kd_sertifikat="{{$sertifikat->kd_sertifikat}}"
                                                    data-kd_pengguna="{{$sertifikat->kd_pengguna}}"
                                                    data-kd_program="{{$sertifikat->kd_program}}"
                                                    data-tgl_terbit="{{$sertifikat->tgl_terbit}}"
                                                    data-tgl_kadaluarsa="{{$sertifikat->tgl_kadaluarsa}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                </button>
                                                <a href="/admin/dataMember/sertifikat/hapusSertifikat/{{$sertifikat->kd_sertifikat}}" type="button" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>&nbsp;
                                                </a>
                                                <a href="{{$sertifikat->gambar_sertifikat}}" type="button" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-certificate"></i>&nbsp;
                                                </a>
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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> 
    
    <script>
        $('#tgl_terbit').datepicker();
    </script>

    <script>
        $('#tgl_terbit2').datepicker();
    </script>

    <script>
        $('#tgl_kadaluarsa').datepicker();
    </script>

    <script>
        $('#tgl_kadaluarsa2').datepicker();
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahSertifikat').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_pengguna = button.data('kd_pengguna');
              var kd_sertifikat = button.data('kd_sertifikat');
              var kd_program = button.data('kd_program');
              var tgl_terbit = button.data('tgl_terbit');
              var tgl_kadaluarsa = button.data('tgl_kadaluarsa');
             
              var modal = $(this);
              modal.find('.modal-body #kd_pengguna').val(kd_pengguna);
              modal.find('.modal-body #kd_sertifikat').val(kd_sertifikat);
              modal.find('.modal-body #kd_program').val(kd_program);
              modal.find('.modal-body #tgl_terbit2').val(tgl_terbit);
              modal.find('.modal-body #tgl_kadaluarsa2').val(tgl_kadaluarsa);
            });
        }); 
    </script> 

@endsection