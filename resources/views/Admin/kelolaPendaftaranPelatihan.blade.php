@extends('Admin/masterAdmin')

@section('judul_tab', 'Pendafaran Pelatihan - AdminBLK')
    
@section('active_menu_pendaftaran_pelatihan', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Pendaftaran Pelatihan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pelatihan</a></li>
                                    <li class="active">Pendaftaran Pelatihan</li>
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
                                <strong class="card-title">Kelola Pendaftaran</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahPendaftaran"><i class="fa fa-plus-square"></i>
                                    Daftar
                                    </button>
                                </div>

                                <!-- Modal Daftar -->

                                <div class="modal fade" id="tambahPendaftaran" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Pendaftaran Pelatihan</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/pendaftaran/tambahPendaftaran')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_pendaftaran" name="kd_pendaftaran" placeholder="Masukkan Kode Pendaftaran" class="form-control" 
                                                            @if($pendaftaran->count()>0)
                                                                value="{{App\PendaftaranProgram::all()->last()->kd_pendaftaran+1}}" 
                                                            @else
                                                                value="2000000001" 
                                                            @endif 
                                                            required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pengguna Terdaftar</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_pengguna" id="kd_pengguna" class="form-control" required>
                                                                <option value="">---Pilih Pengguna---</option>
                                                                @foreach($member as $user)
                                                                <option value="{{$user->kd_pengguna}}">{{$user->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Skema Pelatihan</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_skema" id="kd_skema" class="form-control" required>
                                                                <option value="">---Pilih Skema Pelatihan yang Diambil---</option>
                                                                @foreach($skema as $skm)
                                                                <option value="{{$skm->kd_skema}}">{{App\Gelombang::where('kd_gelombang', $skm->kd_gelombang)->value('nama_gelombang')." - ".App\ProgramPelatihan::where('kd_program', $skm->kd_program)->value('nama_program')}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Daftar</button>
                                                    </div>
                                                </form>
                                            </div>    
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Ubah Pendaftaran -->
                                <div class="modal fade" id="ubahPendaftaran" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Pendaftaran</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/pendaftaran/ubahPendaftaran') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Pendaftaran</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_pendaftaran" name="kd_pendaftaran" placeholder="Masukkan Kode Program" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pengguna Terdaftar</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_pengguna" id="kd_pengguna" class="form-control">
                                                                <option value="">---Pilih Pengguna---</option>
                                                                @foreach($member as $user)
                                                                <option value="{{$user->kd_pengguna}}">{{$user->nama_lengkap}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Skema Pelatihan</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_skema" id="kd_skema" class="form-control">
                                                                <option value="">---Pilih Skema Pelatihan yang Diambil---</option>
                                                                @foreach($skema as $skm)
                                                                <option value="{{$skm->kd_skema}}">{{App\Gelombang::where('kd_gelombang', $skm->kd_gelombang)->value('nama_gelombang')." - ".App\ProgramPelatihan::where('kd_program', $skm->kd_program)->value('nama_program')}}</option>
                                                                @endforeach
                                                            </select>
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
                                            <th>Nama Pendaftar</th>
                                            <th>Program</th>
                                            <th>Gelombang</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($pendaftaran as $daftar)
                                        @if($daftar->status == 0)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{App\Member::where('kd_pengguna', $daftar->kd_pengguna)->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_program'))->value('nama_program')}}</td>
                                            <td>{{App\Gelombang::where('kd_gelombang', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_gelombang'))->value('nama_gelombang')}}</td>
                                            <td>
                                                @if($daftar->status == 0)
                                                <button class="btn btn-warning" disabled>Daftar Tunggu</button>
                                                @elseif($daftar->status == 1)
                                                <button class="btn btn-primary" disabled>Peserta</button>
                                                @elseif($daftar->status == 2)
                                                <button class="btn btn-success" disabled>Lulus</button>
                                                @elseif($daftar->status == 3)
                                                <button class="btn btn-danger" disabled>Tidak Lulus</button>
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                        data-target="#ubahPendaftaran" 
                                                        data-toggle="modal"
                                                        data-kd_pendaftaran="{{$daftar->kd_pendaftaran}}"
                                                        data-kd_skema="{{$daftar->kd_skema}}"
                                                        data-kd_pengguna="{{$daftar->kd_pengguna}}">
                                                        <i class="fa fa-edit"></i>&nbsp; 
                                                        Ubah
                                                    </button>
                                                </div>

                                                <div class="col-4">
                                                    <a href="/admin/dataPelatihan/pendaftaran/hapusPendaftaran/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                        Hapus
                                                    </a>
                                                </div>

                                                <div class="col-6">
                                                    @if($daftar->status == 1)
                                                        <a href="/admin/dataPelatihan/pendaftaran/tidakLulus/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                            Konfirmasi Tidak Lulus
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @elseif($daftar->status == 1)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{App\Member::where('kd_pengguna', $daftar->kd_pengguna)->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_program'))->value('nama_program')}}</td>
                                            <td>{{App\Gelombang::where('kd_gelombang', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_gelombang'))->value('nama_gelombang')}}</td>
                                            <td>
                                                @if($daftar->status == 0)
                                                <button class="btn btn-warning" disabled>Daftar Tunggu</button>
                                                @elseif($daftar->status == 1)
                                                <button class="btn btn-primary" disabled>Peserta</button>
                                                @elseif($daftar->status == 2)
                                                <button class="btn btn-success" disabled>Lulus</button>
                                                @elseif($daftar->status == 3)
                                                <button class="btn btn-danger" disabled>Tidak Lulus</button>
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                        data-target="#ubahPendaftaran" 
                                                        data-toggle="modal"
                                                        data-kd_pendaftaran="{{$daftar->kd_pendaftaran}}"
                                                        data-kd_skema="{{$daftar->kd_skema}}"
                                                        data-kd_pengguna="{{$daftar->kd_pengguna}}">
                                                        <i class="fa fa-edit"></i>&nbsp; 
                                                        Ubah
                                                    </button>
                                                </div>

                                                <div class="col-4">
                                                    <a href="/admin/dataPelatihan/pendaftaran/hapusPendaftaran/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                        Hapus
                                                    </a>
                                                </div>

                                                <div class="col-6">
                                                    @if($daftar->status == 1)
                                                        <a href="/admin/dataPelatihan/pendaftaran/tidakLulus/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                            Konfirmasi Tidak Lulus
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @elseif($daftar->status == 2)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{App\Member::where('kd_pengguna', $daftar->kd_pengguna)->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_program'))->value('nama_program')}}</td>
                                            <td>{{App\Gelombang::where('kd_gelombang', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_gelombang'))->value('nama_gelombang')}}</td>
                                            <td>
                                                @if($daftar->status == 0)
                                                <button class="btn btn-warning" disabled>Daftar Tunggu</button>
                                                @elseif($daftar->status == 1)
                                                <button class="btn btn-primary" disabled>Peserta</button>
                                                @elseif($daftar->status == 2)
                                                <button class="btn btn-success" disabled>Lulus</button>
                                                @elseif($daftar->status == 3)
                                                <button class="btn btn-danger" disabled>Tidak Lulus</button>
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                        data-target="#ubahPendaftaran" 
                                                        data-toggle="modal"
                                                        data-kd_pendaftaran="{{$daftar->kd_pendaftaran}}"
                                                        data-kd_skema="{{$daftar->kd_skema}}"
                                                        data-kd_pengguna="{{$daftar->kd_pengguna}}">
                                                        <i class="fa fa-edit"></i>&nbsp; 
                                                        Ubah
                                                    </button>
                                                </div>

                                                <div class="col-4">
                                                    <a href="/admin/dataPelatihan/pendaftaran/hapusPendaftaran/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                        Hapus
                                                    </a>
                                                </div>

                                                <div class="col-6">
                                                    @if($daftar->status == 1)
                                                        <a href="/admin/dataPelatihan/pendaftaran/tidakLulus/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                            Konfirmasi Tidak Lulus
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @elseif($daftar->status == 3)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{App\Member::where('kd_pengguna', $daftar->kd_pengguna)->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_program'))->value('nama_program')}}</td>
                                            <td>{{App\Gelombang::where('kd_gelombang', App\SkemaPelatihan::where('kd_skema', $daftar->kd_skema)->value('kd_gelombang'))->value('nama_gelombang')}}</td>
                                            <td>
                                                @if($daftar->status == 0)
                                                <button class="btn btn-warning" disabled>Daftar Tunggu</button>
                                                @elseif($daftar->status == 1)
                                                <button class="btn btn-primary" disabled>Peserta</button>
                                                @elseif($daftar->status == 2)
                                                <button class="btn btn-success" disabled>Lulus</button>
                                                @elseif($daftar->status == 3)
                                                <button class="btn btn-danger" disabled>Tidak Lulus</button>
                                                @endif
                                            </td>
                                            <td>
                                                
                                                <div class="col-4">
                                                    <button type="button" class="btn btn-success btn-sm" 
                                                        data-target="#ubahPendaftaran" 
                                                        data-toggle="modal"
                                                        data-kd_pendaftaran="{{$daftar->kd_pendaftaran}}"
                                                        data-kd_skema="{{$daftar->kd_skema}}"
                                                        data-kd_pengguna="{{$daftar->kd_pengguna}}">
                                                        <i class="fa fa-edit"></i>&nbsp; 
                                                        Ubah
                                                    </button>
                                                </div>

                                                <div class="col-4">
                                                    <a href="/admin/dataPelatihan/pendaftaran/hapusPendaftaran/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>&nbsp;
                                                        Hapus
                                                    </a>
                                                </div>

                                                <div class="col-6">
                                                    @if($daftar->status == 1)
                                                        <a href="/admin/dataPelatihan/pendaftaran/tidakLulus/{{$daftar->kd_pendaftaran}}" type="button" class="btn btn-danger btn-sm">
                                                            Konfirmasi Tidak Lulus
                                                        </a>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
    <script src="https://cdn.tiny.cloud/1/cn0rsfqf5862dtcrgnngsfyi4vmj1ketcg7q1gtaw5w115xh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'#detail_program'});</script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahPendaftaran').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_pendaftaran = button.data('kd_pendaftaran');
              var kd_pengguna = button.data('kd_pengguna');
              var kd_skema = button.data('kd_skema');
             
              var modal = $(this);
              modal.find('.modal-body #kd_pendaftaran').val(kd_pendaftaran);
              modal.find('.modal-body #kd_pengguna').val(kd_pengguna);
              modal.find('.modal-body #kd_skema').val(kd_skema);
            });
        }); 
    </script> 

@endsection