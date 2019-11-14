@extends('Admin/masterAdmin')

@section('judul_tab', 'Link Dinas Terkait - AdminBLK')
    
@section('active_menu_kelola_link', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Link Dinas Terkait</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Konten</a></li>
                                    <li class="active">Link Dinas Terkait</li>
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
                                <strong class="card-title">Kelola Link Dinas Terkait</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahLink"><i class="fa fa-plus-square"></i>
                                    Tambah Link
                                    </button>
                                </div>

                                <!-- Modal Tambah Link -->

                                <div class="modal fade" id="tambahLink" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Link</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/link/tambahLink')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Link</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="link" name="link" placeholder="Masukkan Link Dinas" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Dinas</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_dinas_terkait" name="nama_dinas_terkait" placeholder="Masukkan Nama Dinas" class="form-control" required>
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

                                <!-- Modal Ubah Link -->
                                <div class="modal fade" id="ubahLink" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Serifikat</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/link/ubahLink') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Link</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kd_link" name="kd_link" placeholder="Masukkan Kode Link " class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Link</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="link" name="link" placeholder="Masukkan Link Dinas" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Dinas</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_dinas_terkait" name="nama_dinas_terkait" placeholder="Masukkan Nama Dinas" class="form-control" required>
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
                                            <th>Link</th>
                                            <th>Nama Dinas Terkait</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($link as $link)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$link->link}}</td>
                                            <td>{{$link->nama_dinas_terkait}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahLink" 
                                                    data-toggle="modal"
                                                    data-kd_link="{{$link->kd_link}}"
                                                    data-link="{{$link->link}}"
                                                    data-nama_dinas_terkait="{{$link->nama_dinas_terkait}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                </button>
                                                <a href="/admin/dataKonten/link/hapusLink/{{$link->kd_link}}" type="button" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>&nbsp;
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

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahLink').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_link = button.data('kd_link');
              var link = button.data('link');
              var nama_dinas_terkait = button.data('nama_dinas_terkait');
             
              var modal = $(this);
              modal.find('.modal-body #kd_link').val(kd_link);
              modal.find('.modal-body #link').val(link);
              modal.find('.modal-body #nama_dinas_terkait').val(nama_dinas_terkait);
            });
        }); 
    </script> 

@endsection