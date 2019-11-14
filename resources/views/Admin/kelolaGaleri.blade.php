@extends('Admin/masterAdmin')

@section('judul_tab', 'Galeri - AdminBLK')
    
@section('active_menu_kelola_galeri', 'active')

@section('content')

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Galeri</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Data Konten</a></li>
                                    <li class="active">Galeri</li>
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
                                <strong class="card-title">Kelola Galeri</strong>
                            </div>
                        
                            <div class="card-body">

                                <div class="col-lg-3 col-md-6">
                                    <button type="button" class="btn btn-info mb-1" data-toggle="modal" data-target="#tambahGaleri"><i class="fa fa-plus-square"></i>
                                    Tambah Galeri
                                    </button>
                                </div>

                                <!-- Modal Tambah Galeri -->

                                <div class="modal fade" id="tambahGaleri" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="mediumModalLabel"><strong>Tambah Galeri</strong></h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>      
                                            <div class="modal-body">
                                                <form action="{{ url('/admin/dataKonten/galeri/tambahGaleri')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                                    {{ csrf_field()}}

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="file-multiple-input" class=" form-control-label">Unggah File</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="file" id="url_galeri" name="url_galeri[]" multiple="" class="form-control-file">
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col col-md-3">
                                                            <label for="text-input" class=" form-control-label">Media</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="kd_media" id="kd_media" class="form-control" required>
                                                                <option value="">---Pilih Media---</option>
                                                                @foreach($media as $media)
                                                                <option value="{{$media->kd_media}}">{{$media->nama_media}}</option>
                                                                @endforeach
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
                                            <th>Galeri</th>
                                            <th>Media</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($galeri as $galery)
                                        <tr>
                                            <td>{{$i+=1}}</td>
                                            <td><img src="
                                                <?php
                                                    $url = JD\Cloudder\Facades\Cloudder::show($galery->url_galeri, ['width'=>110, 'height'=>60]);
                                                    echo $url;
                                                ?> " alt="" style="margin-bottom: 20px"></img>
                                            </td>
                                            <td>{{App\Media::where('kd_media', $galery->kd_media)->value('nama_media')}}</td>
                                            <td>
                                                <a href="
                                                    <?php
                                                        $url = JD\Cloudder\Facades\Cloudder::show($galery->url_galeri, ['width'=>1920, 'height'=>1080]);
                                                        echo $url;
                                                    ?> 
                                                " class="btn btn-primary btn-sm" >
                                                    <i class="fa fa-eye"></i>&nbsp; 
                                                </a>
                                                <a href="/admin/dataKonten/galeri/hapusGaleri/{{$galery->kd_galeri}}/{{$galery->url_galeri}}" type="button" class="btn btn-danger btn-sm">
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
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> 

@endsection