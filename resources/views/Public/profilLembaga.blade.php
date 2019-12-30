@extends('/Public/masterPublic')

@section('title', 'Profil Lembaga')
    
@section('content')
    
    <div class="page-title lb single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-star bg-orange"></i>Profil Dinas</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Profil Dinas</li>
                    </ol>
                </div><!-- end col -->                    
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-wrapper">
                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Tentang Dinas</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="/images/logo_blk.png" alt="" class="img-fluid rounded-circle"> 
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="/">Balai Latihan Kerja Indramayu</a></h4>
                                    
                                    <h6>{!!$profil->profil_lembaga!!}</h6>

                                    <br>

                                    <h6>{!!$profil->alamat!!}</h6>
                                    <h6>{!!$profil->kontak!!}</h6>
                                    <h6>{!!$profil->email!!}</h6>

                                    <div class="topsocial">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="/" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                    </div><!-- end social -->

                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                                <h4 class="small-title">Visi Misi</h4>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                        <img src="/images/logo_blk.png" alt="" class="img-fluid rounded-circle"> 
                                    </div><!-- end col -->
    
                                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">                                    
                                        <img src="
                                            <?php
                                                $url = JD\Cloudder\Facades\Cloudder::show($profil->visi_misi, ['width'=>1280, 'height'=>720]);
                                                echo $url;
                                            ?>
                                        " alt="">
                                    </div><!-- end col -->
                                </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">
                            
                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">Struktur Organisasi</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                    <img src="/images/logo_blk.png" alt="" class="img-fluid rounded-circle"> 
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">                                    
                                    <img src="
                                        <?php
                                            $url = JD\Cloudder\Facades\Cloudder::show($profil->struktur_organisasi, ['width'=>1280, 'height'=>720]);
                                            echo $url;
                                        ?>
                                    " alt="">
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection