@extends('Admin/masterAdmin')

@section('judul_tab', 'Skema Pelatihan - AdminBLK')
    
@section('active_menu_kelola_skema', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Skema Pelatihan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pelatihan</a></li>
                                    <li class="active">Skema Pelatihan</li>
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
                                <strong class="card-title">Kelola Skema Pelatihan</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahSkema"><i class="fa fa-plus-square"></i>
                                    Tambah Skema
                                    </button>
                                </div>

                                <!-- Modal Tambah SKema -->

                                <div class="modal fade" id="tambahSkema" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Skema Pelatihan</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/skema/tambahSkema')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_skema" name="kd_skema" placeholder="Masukkan Kode Program" class="form-control" 
                                                            @if($skema->count()>0)
                                                                value="{{App\SkemaPelatihan::all()->last()->kd_skema+1}}" 
                                                            @else
                                                                value="1323" 
                                                            @endif 
                                                            required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_program" id="kd_program" class="form-control" required>
                                                                <option value="">---Pilih Program---</option>
                                                                @foreach($program as $prog)
                                                                <option value="{{$prog->kd_program}}">{{$prog->nama_program}}</option>
                                                                @endforeach
                                                            </select>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_gelombang" id="kd_gelombang" class="form-control" required>
                                                                <option value="">---Pilih Gelombang---</option>
                                                                @foreach($gelombang as $gel)
                                                                <option value="{{$gel->kd_gelombang}}">{{$gel->nama_gelombang}}</option>
                                                                @endforeach
                                                            </select>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Awal Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_awal_pendaftaran" name="tgl_awal_pendaftaran" placeholder="Masukkan Tanggal Awal Pendaftaran" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Akhir Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_akhir_pendaftaran" name="tgl_akhir_pendaftaran" placeholder="Masukkan Tanggal Akhir Pendaftaran" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Seleksi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_seleksi" name="tgl_seleksi" placeholder="Masukkan Tanggal Pengumuman Seleksi" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Awal Pelaksanaan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_awal_pelaksanaan" name="tgl_awal_pelaksanaan" placeholder="Masukkan Tanggal Awal Pelaksanaan" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Akhir Pelaksanaan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_akhir_pelaksanaan" name="tgl_akhir_pelaksanaan" placeholder="Masukkan Tanggal Akhir Pelaksanaan" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kuota</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kuota" name="kuota" placeholder="Masukkan Kuota Peserta" class="form-control" required>
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

                                <!-- Modal Ubah Skema -->
                                <div class="modal fade" id="ubahSkema" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Program</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/skema/ubahSkema') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_skema" name="kd_skema" placeholder="Masukkan Kode Program" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_program" id="kd_program" class="form-control" required>
                                                                <option value="">---Pilih Program---</option>
                                                                @foreach($program as $prog)
                                                                <option value="{{$prog->kd_program}}">{{$prog->nama_program}}</option>
                                                                @endforeach
                                                            </select>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_gelombang" id="kd_gelombang" class="form-control" required>
                                                                <option value="">---Pilih Gelombang---</option>
                                                                @foreach($gelombang as $gel)
                                                                <option value="{{$gel->kd_gelombang}}">{{$gel->nama_gelombang}}</option>
                                                                @endforeach
                                                            </select>                                                        
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Awal Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_awal_pendaftaran2" name="tgl_awal_pendaftaran2" placeholder="Masukkan Tanggal Awal Pendaftaran" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Akhir Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_akhir_pendaftaran2" name="tgl_akhir_pendaftaran2" placeholder="Masukkan Tanggal Akhir Pendaftaran" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Seleksi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_seleksi2" name="tgl_seleksi2" placeholder="Masukkan Tanggal Pengumuman Seleksi" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Awal Pelaksanaan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_awal_pelaksanaan2" name="tgl_awal_pelaksanaan2" placeholder="Masukkan Tanggal Awal Pelaksanaan" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Tanggal Akhir Pelaksanaan</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="tgl_akhir_pelaksanaan2" name="tgl_akhir_pelaksanaan2" placeholder="Masukkan Tanggal Akhir Pelaksanaan" class="form-control" required readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kuota</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kuota" name="kuota" placeholder="Masukkan Kuota Peserta" class="form-control" required>
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
                                            <th>Program</th>
                                            <th>Gelombang</th>
                                            <th>Awal Pendaftaran</th>
                                            <th>Akhir Pendaftaran</th>
                                            <th>Pengumuman</th>
                                            <th>Awal Pelaksanaan</th>
                                            <th>Akhir Pelaksanaan</th>
                                            <th>Kuota Peserta</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($skema as $skema)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', $skema->kd_program)->value('nama_program')}}</td>
                                            <td>{{App\Gelombang::where('kd_gelombang', $skema->kd_gelombang)->value('nama_gelombang')}}</td>
                                            <td>{{$skema->tgl_awal_pendaftaran}}</td>
                                            <td>{{$skema->tgl_akhir_pendaftaran}}</td>
                                            <td>{{$skema->tgl_seleksi}}</td>
                                            <td>{{$skema->tgl_awal_pelaksanaan}}</td>
                                            <td>{{$skema->tgl_akhir_pelaksanaan}}</td>
                                            <td>{{$skema->kuota}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahSkema" 
                                                    data-toggle="modal"
                                                    data-kd_skema="{{$skema->kd_skema}}"
                                                    data-kd_program="{{$skema->kd_program}}"
                                                    data-kd_gelombang="{{$skema->kd_gelombang}}"
                                                    data-tgl_awal_pendaftaran="{{$skema->tgl_awal_pendaftaran}}"
                                                    data-tgl_akhir_pendaftaran="{{$skema->tgl_akhir_pendaftaran}}"
                                                    data-tgl_seleksi="{{$skema->tgl_seleksi}}"
                                                    data-tgl_awal_pelaksanaan="{{$skema->tgl_awal_pelaksanaan}}"
                                                    data-tgl_akhir_pelaksanaan="{{$skema->tgl_akhir_pelaksanaan}}"
                                                    data-kuota="{{$skema->kuota}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataPelatihan/skema/hapusSkema/{{$skema->kd_skema}}" type="button" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>&nbsp;
                                                    Hapus
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
        $('#tgl_awal_pendaftaran').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_akhir_pendaftaran').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_seleksi').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_awal_pelaksanaan').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_akhir_pelaksanaan').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_awal_pendaftaran2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_akhir_pendaftaran2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_seleksi2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_awal_pelaksanaan2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_akhir_pelaksanaan2').datepicker({
            format: 'dd mmm yyyy',
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahSkema').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_skema = button.data('kd_skema');
              var kd_program = button.data('kd_program');
              var kd_gelombang = button.data('kd_gelombang');
              var tgl_awal_pendaftaran = button.data('tgl_awal_pendaftaran');
              var tgl_akhir_pendaftaran = button.data('tgl_akhir_pendaftaran');
              var tgl_seleksi = button.data('tgl_seleksi');
              var tgl_awal_pelaksanaan = button.data('tgl_awal_pelaksanaan');
              var tgl_akhir_pelaksanaan = button.data('tgl_akhir_pelaksanaan');
              var kuota = button.data('kuota');
             
              var modal = $(this);
              modal.find('.modal-body #kd_skema').val(kd_skema);
              modal.find('.modal-body #kd_program').val(kd_program);
              modal.find('.modal-body #kd_gelombang').val(kd_gelombang);
              modal.find('.modal-body #tgl_awal_pendaftaran2').val(tgl_awal_pendaftaran);
              modal.find('.modal-body #tgl_akhir_pendaftaran2').val(tgl_akhir_pendaftaran);
              modal.find('.modal-body #tgl_seleksi2').val(tgl_seleksi);
              modal.find('.modal-body #tgl_awal_pelaksanaan2').val(tgl_awal_pelaksanaan);
              modal.find('.modal-body #tgl_akhir_pelaksanaan2').val(tgl_akhir_pelaksanaan);
              modal.find('.modal-body #kuota').val(kuota);
            });
        }); 
    </script> 

@endsection