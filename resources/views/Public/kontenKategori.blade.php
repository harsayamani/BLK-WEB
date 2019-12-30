@extends('Public/masterPublic')

@section('title', 'Kategori - {{$kategori}}')
    
@section('content')

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-top clearfix">
                    <h4 class="pull-left">Kategori {{$kategori}}<a href="#"><i class="fa fa-rss"></i></a></h4>
                    </div><!-- end blog-top -->

                    @foreach ($konten as $kon)
                    <div class="blog-list clearfix">
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="/konten/{{$kon->kd_konten}}" title="">
                                        <img src="
                                        <?php
                                            $url = JD\Cloudder\Facades\Cloudder::show($kon->foto, ['width'=>600, 'height'=>500]);
                                            echo $url;
                                        ?>
                                        " alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->
                                 
                            <div class="blog-meta big-meta col-md-8">
                            <h4><a href="/konten/{{$kon->kd_konten}}" title="">{{$kon->judul_konten}}</a></h4>
                            <p>{!!substr($kon->isi_konten, 0, 60)!!}</p>
                            <small class="firstsmall"><a class="bg-orange" href="#" title="">{{App\KategoriKonten::where('kd_kategori_konten', $kon->kd_kategori)->value('kategori_konten')}}</a></small>
                            <small><a href="#" title="">{{$kon->tgl_rilis}}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        <hr class="invis">
                    </div><!-- end blog-list -->
                    @endforeach
                </div><!-- end page-wrapper -->

                    <div class="row">
                        <div class="col-md-12">
                            <nav aria-label="Page navigation">
                                    {!! $konten->links() !!}
                            </nav>
                        </div><!-- end col -->
                    </div>   
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    {{-- <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="/upload/banner_07.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget --> --}}

                    <div class="widget">
                        <h2 class="widget-title">Galeri</h2>
                        <div class="trend-videos">

                            @for($i=0; $i<1; $i++)
                                
                            <div class="blog-box">
                                <div class="post-media">
                                    <a href="{{JD\Cloudder\Facades\Cloudder::show($galeri[$i]->url_galeri, ['width'=>800, 'height'=>460])}}" title="">
                                        <img src="
                                        <?php
                                            $url = JD\Cloudder\Facades\Cloudder::show($galeri[$i]->url_galeri, ['width'=>800, 'height'=>460]);
                                            echo $url;
                                        ?>
                                        " alt="" class="img-fluid">
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end blog-box -->

                            <hr class="invis">

                            @endfor

                        </div><!-- end videos -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Postingan Populer</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @for($a=0; $a<1; $a++)
                                <a href="/konten/{{$konten[$a]->kd_konten}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="
                                        <?php
                                            $url = JD\Cloudder\Facades\Cloudder::show($konten[$a]->foto, ['width'=>600, 'height'=>500]);
                                            echo $url;
                                        ?>
                                        " alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{$konten[$a]->judul_konten}}</h5>
                                        <small>{{$konten[$a]->tgl_rilis}}</small>
                                    </div>
                                </a>
                                @endfor
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Link Dinas Terkait</h2>
                        <div class="link-widget">
                            <ul>
                                @foreach($link_dinas as $link)
                                <li><a href="{{$link->link}}">{{$link->nama_dinas_terkait}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- end link-widget -->                        
                    </div><!-- end widget -->

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
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                    {{-- <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget --> --}}
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection

