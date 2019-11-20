@extends('Admin/masterAdmin')

@section('judul_tab', 'Lowongan Pekerjaan - AdminBLK')
    
@section('active_menu_kelola_loker', 'active')

@section('content')

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Lowongan Pekerjaan</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Konten</a></li>
                                    <li class="active">Lowongan Pekerjaan</li>
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
                            <form action="{{ url('/admin/dataKonten/loker/tambahLoker')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                <div class="card-header">
                                    <strong class="card-title">Tambah Lowongan Pekerjaan</strong>
                                </div>
                        
                                <div class="card-body">
                                    {{csrf_field()}}
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="judul_konten" class=" form-control-label">Judul</label>
                                            <input type="text" id="judul" name="judul" placeholder="Masukkan Judul" class="form-control">
                                        </div>
                                    </div>
                        
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="kd_minat" class=" form-control-label">Minat</label>
                                            <select name="kd_minat" id="kd_minat" class="form-control" required>
                                                <option value="">---Pilih Minat---</option>
                                                @foreach($minat as $min)
                                                <option value="{{$min->kd_minat}}">{{$min->minat}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="foto" class=" form-control-label">Foto</label>
                                            <input type="file" id="foto" name="foto" accept="image/*" class="form-control-file" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tgl_rilis" class=" form-control-label">Tanggal Rilis</label>
                                            <input readonly type="text" id="tgl_rilis" name="tgl_rilis" placeholder="Masukkan Tanggal Rilis" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="isi_konten" class=" form-control-label">Isi</label>
                                            <textarea id="isi" name="isi" placeholder="Masukkan Isi" class="form-control" required>
                                            </textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Publikasikan</button> 
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">

                            <div class="card-header">
                                <strong class="card-title">Kelola Loker</strong>
                            </div>

                            <div class="card-body">

                                <!-- Modal Ubah Loker -->
                                <div class="modal fade" id="ubahLoker" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Loker</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/loker/ubahLoker') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="col-lg-12" hidden>
                                                        <div class="form-group">
                                                            <label for="kd_loker" class=" form-control-label">Kode Loker</label>
                                                            <input type="text" id="kd_loker" name="kd_loker" class="form-control" readonly required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="judul" class=" form-control-label">Judul</label>
                                                            <input type="text" id="judul" name="judul" placeholder="Masukkan Judul" class="form-control" required>
                                                        </div>
                                                    </div>
                                        
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="kd_minat" class=" form-control-label">Minat</label>
                                                            <select name="kd_minat" id="kd_minat" class="form-control" required>
                                                                <option value="">---Pilih Minat---</option>
                                                                @foreach($minat as $min)
                                                                <option value="{{$min->kd_minat}}">{{$min->minat}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="foto" class=" form-control-label">Foto</label>
                                                            <input type="file" id="foto" name="foto" accept="image/*" class="form-control-file">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="tgl_rilis" class=" form-control-label">Tanggal Rilis</label>
                                                            <input readonly type="text" id="tgl_rilis2" name="tgl_rilis2" placeholder="Masukkan Tanggal Rilis" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label for="isi" class=" form-control-label">Isi</label>
                                                            <textarea id="isi" name="isi" placeholder="Masukkan Isi" class="form-control" required>
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

                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul</th>
                                            <th>Minat</th>
                                            <th>Tanggal Rilis</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($loker as $lok)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td>{{$lok->judul}}</td>
                                            <td>{{App\Minat::where('kd_minat', $lok->kd_minat)->value('minat')}}</td>
                                            <td>{{$lok->tgl_rilis}}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahLoker" 
                                                    data-toggle="modal"
                                                    data-kd_loker="{{$lok->kd_loker}}"
                                                    data-judul="{{$lok->judul}}"
                                                    data-isi="{{$lok->isi}}"
                                                    data-kd_minat="{{$lok->kd_minat}}"
                                                    data-foto="{{$lok->foto}}"
                                                    data-tgl_rilis="{{$lok->tgl_rilis}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataKonten/loker/hapusLoker/{{$lok->kd_loker}}" type="button" class="btn btn-danger btn-sm">
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
    <script src="https://cdn.tiny.cloud/1/cn0rsfqf5862dtcrgnngsfyi4vmj1ketcg7q1gtaw5w115xh/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({selector:'#isi'});</script>

    <script>
        $('#tgl_rilis').datetimepicker({
            format: 'dd mmmm yyyy HH:MM' ,
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script>
        $('#tgl_rilis2').datetimepicker({
            format: 'dd mmmm yyyy HH:MM' ,
            uiLibrary: 'bootstrap4'
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahLoker').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_loker = button.data('kd_loker');
              var judul = button.data('judul');
              var isi = button.data('isi');
              var kd_minat = button.data('kd_minat');
              var tgl_rilis = button.data('tgl_rilis');
             
              var modal = $(this);
              modal.find('.modal-body #kd_loker').val(kd_loker);
              modal.find('.modal-body #judul').val(judul);
              modal.find('.modal-body #isi').val(isi);
              modal.find('.modal-body #kd_minat').val(kd_minat);
              modal.find('.modal-body #tgl_rilis2').val(tgl_rilis);
            });
        }); 
    </script> 

@endsection