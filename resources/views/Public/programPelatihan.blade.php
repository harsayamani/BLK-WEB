@extends('Public/masterPublic')

@section('title', 'Program Pelatihan - Balai Latihan Kerja - Disnaker Kabupaten Indramayu')
    
@section('content')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <h2><i class="fa fa-tasks bg-orange"></i> Program Pelatihan</h2>
        </div><!-- end col -->
        <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active">Program Pelatihan</li>
            </ol>
        </div><!-- end col -->                    
    </div><!-- end row -->
</div><!-- end container -->
</div><!-- end page-title -->

<section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-wrapper">
                        <div class="blog-title-area text-center">          
                            <h3>Daftar Program Pelatihan</h3>
                        </div><!-- end title -->

                        <div class="single-post-media">
                            <img src="/images/2083.jpg" width="70px" height="50px" alt="" class="img-fluid">
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
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

@endsection