@extends('Admin/masterAdmin')

@section('judul_tab', 'Gelombang Pendaftaran - AdminBLK')
    
@section('active_menu_kelola_gelombang', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Gelombang Pendaftaran</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Pelatihan</a></li>
                                    <li class="active">Gelombang</li>
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
                                <strong class="card-title">Kelola Gelombang</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahGelombang"><i class="fa fa-plus-square"></i>
                                    Tambah Gelombang
                                    </button>
                                </div>

                                <!-- Modal Tambah Gelombang -->

                                <div class="modal fade" id="tambahGelombang" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Gelombang</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/gelombang/tambahGelombang')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_gelombang" name="kd_gelombang" placeholder="Masukkan Kode Gelombang" class="form-control" 
                                                            @if($gelombang->count()>0)
                                                                value="{{App\Gelombang::all()->last()->kd_gelombang+1}}" 
                                                            @else
                                                                value="1543" 
                                                            @endif 
                                                            required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_gelombang" name="nama_gelombang" placeholder="Masukkan Nama Gelombang" class="form-control" required>
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

                                <!-- Modal Ubah Gelombang -->
                                <div class="modal fade" id="ubahGelombang" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Gelombang</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataPelatihan/gelombang/ubahGelombang') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_gelombang" name="kd_gelombang" placeholder="Masukkan Kode Gelombang" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Gelombang</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="nama_gelombang" name="nama_gelombang" placeholder="Masukkan Nama Gelombang" class="form-control" required>
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
                                            <th>Nama Gelombang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($gelombang as $gelombang)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$gelombang->nama_gelombang}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahGelombang" 
                                                    data-toggle="modal"
                                                    data-kd_gelombang="{{$gelombang->kd_gelombang}}"
                                                    data-nama_gelombang="{{$gelombang->nama_gelombang}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataPelatihan/gelombang/hapusGelombang/{{$gelombang->kd_gelombang}}" type="button" class="btn btn-danger btn-sm">
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

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahGelombang').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_gelombang = button.data('kd_gelombang');
              var nama_gelombang = button.data('nama_gelombang');
             
              var modal = $(this);
              modal.find('.modal-body #kd_gelombang').val(kd_gelombang);
              modal.find('.modal-body #nama_gelombang').val(nama_gelombang);
            });
        }); 
    </script> 

@endsection