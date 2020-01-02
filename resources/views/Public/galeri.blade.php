@extends('/Public/masterPublic')

@section('title', 'Galeri - Balai Latihan Kerja - Disnaker Kabupaten Indramayu')
    
@section('content')

    <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-picture-o bg-orange"></i> Galeri</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Galeri</li>
                    </ol>
                </div><!-- end col -->                    
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">

                                @foreach ($galeri as $gal)
                                    
                                <div class="col-md-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="{{JD\Cloudder\Facades\Cloudder::show($gal->url_galeri, ['width'=>1920, 'height'=>1080])}}" title="">
                                                <img src="
                                                <?php
                                                    $url = JD\Cloudder\Facades\Cloudder::show($gal->url_galeri, ['width'=>800, 'height'=>460]);
                                                    echo $url;
                                                ?>
                                                " alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta big-meta">
                                            <span class="color-orange"><a href="#" title="">{{App\Media::where('kd_media', $gal->kd_media)->value('nama_media')}}</a></span>
                                        <small><a href="#" title="">{{$gal->created_at}}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                                @endforeach

                            </div><!-- end row -->
                        </div><!-- end blog-grid-system -->
                    </div><!-- end page-wrapper -->

                    <hr class="invis3">

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-start">
                                    {{$galeri->links()}}
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection