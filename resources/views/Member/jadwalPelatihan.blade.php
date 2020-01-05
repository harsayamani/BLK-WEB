@extends('Member/masterMember')

@section('title_bar', 'Jadwal Pelatihan | SIBLK')
    
@section('active2', 'active')

@section('title_page', 'Jadwal')

@section('section')

<section class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <form class="form horizontal" method="POST" action="/member/jadwalPelatihan/filter">
                        {{ csrf_field() }}
                    <div class="card-header d-flex align-items-center">
                        <div class="col-md-6">
                            <select class="form-control" id="kd_gelombang" name="kd_gelombang">
                                <option value="">---Pilih Gelombang---</option>
                                @foreach ($gelombang as $gel)
                                <option value="{{$gel->kd_gelombang}}">{{$gel->nama_gelombang}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                    </form>
                    <div class="card-body">
                        <div class="col-md-12">
                            <div class="page-wrapper">
                                <div class="blog-grid-system">
                                    <div class="row">
                                        @foreach ($skema as $skm)
                                        <div class="col-md-3"  id="jadwal">
                                                <div class="blog-box">
                                                    <div class="post-media">
                                                        <a href="#" title="">
                                                            <img src="/images/2083.jpg" alt="" class="img-fluid">
                                                        </a>
                                                    </div><!-- end media -->
                                                    <div class="blog-meta big-meta">
                                                            <span class="color-orange">{{App\Gelombang::where('kd_gelombang', $skm->kd_gelombang)->value('nama_gelombang')}}</span>
                                                            <h4><a href="#" title="">{{App\ProgramPelatihan::where('kd_program', $skm->kd_program)->value('nama_program')}}</a></h4>
                                                            <p>Pendaftaran : <br>{{$skm->tgl_awal_pendaftaran}} - {{$skm->tgl_akhir_pendaftaran}}</p>
                                                            <p>Pelaksanaan : <br>{{$skm->tgl_awal_pelaksanaan}} - {{$skm->tgl_akhir_pelaksanaan}}</p>
                                                    </div><!-- end blog-meta -->
                                                </div><!-- end blog-box -->
                                            </div><!-- end col -->
                                        @endforeach
                                    </div><!-- end row -->
                                </div><!-- end blog-grid-system -->
                            </div><!-- end page-wrapper -->
                            <hr class="invis1">
                            <div class="row">
                                <div class="col-md-12">
                                    <nav aria-label="Page navigation">
                                        <ul class="pagination justify-content-start">
                                        </ul>
                                    </nav>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end col -->
                    </div>
                </div>
              </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

{{-- <script type="text/javascript">
    function data(nilai) {
        var nilai = nilai.value;
        $.ajax({
            url: 'jadwalPelatihan/{id}',
            type: 'GET',
            data: { id: nilai },
        })
    }
</script> --}}

@endsection