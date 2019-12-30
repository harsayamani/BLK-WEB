@extends('Admin/masterAdmin')

@section('judul_tab', 'Program Pelatihan - AdminBLK')
    
@section('active_menu_kelola_program', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Program Pelatihan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pelatihan</a></li>
                                    <li class="active">Program Pelatihan</li>
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
                                <strong class="card-title">Kelola Program Pelatihan</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahProgram"><i class="fa fa-plus-square"></i>
                                    Tambah Program
                                    </button>
                                </div>

                                <!-- Modal Tambah Program -->

                                <div class="modal fade" id="tambahProgram" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Program Pelatihan</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/program/tambahProgram')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_program" name="kd_program" placeholder="Masukkan Kode Program" class="form-control" 
                                                            @if($program->count()>0)
                                                                value="{{App\ProgramPelatihan::all()->last()->kd_program+1}}" 
                                                            @else
                                                                value="1243" 
                                                            @endif 
                                                            required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_program" name="nama_program" placeholder="Masukkan Nama Program" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Detail Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="detail_program" name="detail_program" placeholder="Masukkan IDetail Program" class="form-control" required>
                                                            </textarea>                                                       
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

                                <!-- Modal Ubah Program -->
                                <div class="modal fade" id="ubahProgram" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Program</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/program/ubahProgram') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_program" name="kd_program" placeholder="Masukkan Kode Program" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_program" name="nama_program" placeholder="Masukkan Nama Program" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Detail Program</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="detail_program" name="detail_program" placeholder="Masukkan Detail Program" class="form-control" required>
                                                            </textarea>                                                       
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
                                            <th>Nama Program</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($program as $program)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$program->nama_program}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahProgram" 
                                                    data-toggle="modal"
                                                    data-kd_program="{{$program->kd_program}}"
                                                    data-nama_program="{{$program->nama_program}}"
                                                    data-detail_program="{{$program->detail_program}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataPelatihan/program/hapusProgram/{{$program->kd_program}}" type="button" class="btn btn-danger btn-sm">
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
    <script src="https://cdn.tiny.cloud/1/cn0rsfqf5862dtcrgnngsfyi4vmj1ketcg7q1gtaw5w115xh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script> tinymce.init({selector: "textarea", height: 300}); </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahProgram').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_program = button.data('kd_program');
              var nama_program= button.data('nama_program');
              var detail_program= button.data('detail_program');
              tinymce.activeEditor.setContent(detail_program)
             
              var modal = $(this);
              modal.find('.modal-body #kd_program').val(kd_program);
              modal.find('.modal-body #nama_program').val(nama_program);
              modal.find('.modal-body #detail_program').val(detail_program);
            });
        }); 
    </script> 

@endsection