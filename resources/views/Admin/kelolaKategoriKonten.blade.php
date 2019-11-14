@extends('Admin/masterAdmin')

@section('judul_tab', 'Kategori Konten - AdminBLK')
    
@section('active_menu_kelola_kategori_konten', 'active')

@section('content')

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Kategori Konten</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Konten</a></li>
                                    <li class="active">Kategori Konten</li>
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
                                <strong class="card-title">Kelola Kategori Konten</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahKategoriKonten"><i class="fa fa-plus-square"></i>
                                    Tambah Kategori Konten
                                    </button>
                                </div>

                                <!-- Modal Tambah Kategori Konten -->

                                <div class="modal fade" id="tambahKategoriKonten" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Kategori Konten</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/kategoriKonten/tambahKategoriKonten')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kd_kategori_konten" name="kd_kategori_konten" class="form-control" readonly
                                                            @if($kategori_konten->count()>0)
                                                                value="{{App\KategoriKonten::all()->last()->kd_kategori_konten+1}}" 
                                                            @else
                                                                value="1311" 
                                                            @endif
                                                            >
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kategori_konten" name="kategori_konten" placeholder="Masukkan Kategori Konten" class="form-control" required>
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

                                <!-- Modal Ubah KategoriKonten -->
                                <div class="modal fade" id="ubahKategoriKonten" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Kategori Konten</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/kategoriKonten/ubahKategoriKonten') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="number" id="kd_kategori_konten" name="kd_kategori_konten" class="form-control" readonly>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Nama Kategori</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kategori_konten" name="kategori_konten" placeholder="Masukkan Kategori Konten" class="form-control" required>
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
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($kategori_konten as $kategori)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$kategori->kategori_konten}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahKategoriKonten" 
                                                    data-toggle="modal"
                                                    data-kd_kategori_konten="{{$kategori->kd_kategori_konten}}"
                                                    data-kategori_konten="{{$kategori->kategori_konten}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataKonten/kategoriKonten/hapusKategoriKonten/{{$kategori->kd_kategori_konten}}" type="button" class="btn btn-danger btn-sm">
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
              $('#ubahKategoriKonten').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_kategori_konten = button.data('kd_kategori_konten');
              var kategori_konten = button.data('kategori_konten');
             
              var modal = $(this);
              modal.find('.modal-body #kd_kategori_konten').val(kd_kategori_konten);
              modal.find('.modal-body #kategori_konten').val(kategori_konten);
            });
        }); 
    </script> 

@endsection