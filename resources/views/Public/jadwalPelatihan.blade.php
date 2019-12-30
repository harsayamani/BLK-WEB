@extends('/Public/masterPublic')

@section('title', 'Jadwal Pelatihan')
    
@section('content')

    <div class="page-title lb single-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2><i class="fa fa-picture-o bg-orange"></i>Jadwal Pelatihan</h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Jadwal Pelatihan</li>
                    </ol>
                </div><!-- end col -->                    
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->

    <section class="section">
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <select class="form-control" onchange="data(this)">
                        @foreach ($gelombang as $gel)
                        <option value="{{$gel->kd_gelombang}}">{{$gel->nama_gelombang}}</option>
                        @endforeach
                    </select>
                </div>

                <hr class="invis1">

                <div class="col-md-12">
                    <div class="page-wrapper">
                        <div class="blog-grid-system">
                            <div class="row">

                                @foreach ($skema as $skm)
                                <div class="col-md-4"  id="jadwal">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="#" title="">
                                                    <img src="/images/2083.jpg" alt="" class="img-fluid">
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta big-meta">
                                                    <span class="color-orange"><a href="#" title="">{{App\Gelombang::where('kd_gelombang', $skm->kd_gelombang)->value('nama_gelombang')}}</a></span>
                                                    <h4><a href="#" title="">{{App\ProgramPelatihan::where('kd_program', $skm->kd_program)->value('nama_program')}}</a></h4>
                                                    <p>Pendaftaran : {{$skm->tgl_awal_pendaftaran}} - {{$skm->tgl_akhir_pendaftaran}}</p>
                                                    <p>Pelaksanaan : {{$skm->tgl_awal_pelaksanaan}} - {{$skm->tgl_akhir_pelaksanaan}}</p>
                                            </div><!-- end blog-meta -->
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
                                </ul>
                            </nav>
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    <script type="text/javascript">
        function data(nilai) {
            var nilai = nilai.value;
            $.ajax({
                url: 'jadwalPelatihan/{id}',
                type: 'GET',
                data: { id: nilai },
            })
        }
    </script>

@endsection