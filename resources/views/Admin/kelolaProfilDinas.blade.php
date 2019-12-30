@extends('Admin/masterAdmin')

@section('judul_tab', 'Profil Dinas - AdminBLK')
    
@section('active_menu_kelola_profil_dinas', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Profil Dinas</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Konten</a></li>
                                    <li class="active">Profil Dinas</li>
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
                                <strong class="card-title">Kelola Profil Dinas</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahProfil"><i class="fa fa-plus-square"></i>
                                    Tambah Profil Dinas
                                    </button>
                                </div>

                                <!-- Modal Tambah Profil Dinas -->

                                <div class="modal fade" id="tambahProfil" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Profil Dinas</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/profil/tambahProfil')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Profil</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_profil" name="kd_profil" placeholder="Masukkan Kode Profil" class="form-control" 
                                                            @if($profil->count()>0)
                                                                value="{{App\Profil::all()->last()->kd_profil+1}}" 
                                                            @else
                                                                value="1643" 
                                                            @endif 
                                                            required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Visi Misi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="visi_misi" name="visi_misi" accept="image/*" class="form-control-file" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Struktur Organisasi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="struktur_organisasi" name="struktur_organisasi" accept="image/*" class="form-control-file" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Profil Lembaga</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="profil_lembaga" name="profil_lembaga" placeholder="Masukkan Profil Lembaga" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat Dinas" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kontak</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="kontak" name="kontak" placeholder="Masukkan Kontak Dinas" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email Dinas</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="email" name="email" placeholder="Masukkan Email Dinas" class="form-control" required>
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

                                <!-- Modal Ubah Profil -->
                                <div class="modal fade" id="ubahProfil" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Ubah Profil</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/profil/ubahProfil')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    
                                                    {{ csrf_field()}}

                                                    <div class="row form-group" hidden>
                                                        <div class="col col-md-3">
                                                            <label for="number-input" class=" form-control-label">Kode Profil</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" id="kd_profil" name="kd_profil" placeholder="Masukkan Kode Profil" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Visi Misi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="visi_misi" name="visi_misi" accept="image/*" class="form-control-file">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-input" class=" form-control-label">Struktur Organisasi</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="struktur_organisasi" name="struktur_organisasi" accept="image/*" class="form-control-file">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Profil Lembaga</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="profil_lembaga2" name="profil_lembaga2" placeholder="Masukkan Profil Lembaga" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Alamat</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="alamat" name="alamat" placeholder="Masukkan Alamat Dinas" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Kontak</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="kontak" name="kontak" placeholder="Masukkan Kontak Dinas" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Email Dinas</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <textarea id="email" name="email" placeholder="Masukkan Email Dinas" class="form-control" required>
                                                            </textarea>                                                       
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button  class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                                            <th>Visi Misi</th>
                                            <th>Struktur Organisasi</th>
                                            <th>Alamat</th>
                                            <th>Kontak</th>
                                            <th>email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($profil as $profil)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td><img src="
                                                <?php
                                                    $url = JD\Cloudder\Facades\Cloudder::show($profil->visi_misi, ['width'=>1920, 'height'=>1080]);
                                                    echo $url;
                                                ?> " alt=""  style="margin-bottom: 20px"></img>
                                            </td>
                                            <td><img src="
                                                <?php
                                                    $url = JD\Cloudder\Facades\Cloudder::show($profil->struktur_organisasi, ['width'=>1920, 'height'=>1080]);
                                                    echo $url;
                                                ?> " alt=""  style="margin-bottom: 20px"></img>
                                            </td>
                                            <td>{!!$profil->alamat!!}</td>
                                            <td>{!!$profil->kontak!!}</td>
                                            <td>{!!$profil->email!!}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm" 
                                                    data-target="#ubahProfil" 
                                                    data-toggle="modal"
                                                    data-kd_profil="{{$profil->kd_profil}}"
                                                    data-profil_lemb="{{$profil->profil_lembaga}}"
                                                    data-alamat="{{$profil->alamat}}}"
                                                    data-kontak="{{{$profil->kontak}}}"
                                                    data-email="{{{$profil->email}}}"
                                                >
                                                    <i class="fa fa-edit"></i>&nbsp; 
                                                    Ubah
                                                </button>
                                                <a href="/admin/dataKonten/profil/hapusProfil/{{$profil->kd_profil}}" type="button" class="btn btn-danger btn-sm">
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
    <script>tinymce.init({selector:'#profil_lembaga2', height: 300});</script>

    <script type="text/javascript">
        $(document).ready(function(){
              $('#ubahProfil').on('show.bs.modal', function (event) {
              var button = $(event.relatedTarget);
              var kd_profil = button.data('kd_profil');
              var profil_lembaga = button.data('profil_lemb')
              var alamat = button.data('alamat');
              var kontak = button.data('kontak');
              var email = button.data('email');

              tinymce.activeEditor.setContent(profil_lembaga)
  
              var modal = $(this);
              modal.find('.modal-body #kd_profil').val(kd_profil);
              modal.find('.modal-body #alamat').val(alamat);
              modal.find('.modal-body #profil_lembaga').val(profil_lembaga);
              modal.find('.modal-body #kontak').val(kontak);
              modal.find('.modal-body #email').val(email);
            });
        }); 
    </script> 

@endsection