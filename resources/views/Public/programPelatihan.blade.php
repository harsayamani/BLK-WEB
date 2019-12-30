@extends('Public/masterPublic')

@section('title', 'Program Pelatihan')
    
@section('content')

<section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/">Konten</a></li>
                                <li class="breadcrumb-item active">Program Pelatihan</li>
                            </ol>

                        <span class="color-orange"><a href="#" title="">Program Pelatihan</a></span>

                            <h3>Daftar Program Pelatihan</h3>

                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="/images/2083.jpg" alt="" class="img-fluid">
                        </div><!-- end media -->

                        <div class="blog-content">  
                            {{-- <div class="pp">
                                {!!$konten->isi_konten!!}
                            </div><!-- end pp --> --}}
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Program</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($program as $prog)   
                                    <tr>
                                        <td>{{$i+=1}}</td>
                                        <td>{{$prog->nama_program}}</td>
                                    <td><a href="/programPelatihan/{{$prog->kd_program}}" class="btn btn-info">Info Program</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div><!-- end content -->
                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <div class="widget">
                            <h2 class="widget-title">Follow Us</h2>

                            <div class="row text-center">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button facebook-button">
                                        <i class="fa fa-facebook"></i>
                                        <p>27k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button twitter-button">
                                        <i class="fa fa-twitter"></i>
                                        <p>98k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button google-button">
                                        <i class="fa fa-google-plus"></i>
                                        <p>17k</p>
                                    </a>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                    <a href="#" class="social-button youtube-button">
                                        <i class="fa fa-youtube"></i>
                                        <p>22k</p>
                                    </a>
                                </div>
                            </div>
                        </div><!-- end widget -->

                        
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection