@extends('Public/masterPublic')

@section('title', 'Validasi Sertifikat Pelatihan - Balai Latihan Kerja - Disnaker Kabupaten Indramayu')
    
@section('content')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-certificate bg-orange"></i>Validasi Sertifikat</h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Validasi Sertifikat</li>
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->

    @if (Session()->has('alert modal success'))
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body alert-success">
                    <p>{{session()->get('alert modal success')}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if (Session()->has('alert modal danger'))
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body alert-danger">
                    <p>{{session()->get('alert modal danger')}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          @endif

          @if (Session()->has('alert modal warning'))
            <div class="modal fade" tabindex="-1" role="dialog" id="myModal">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Sertifikat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body alert-warning">
                    <p>{{session()->get('alert modal warning')}}</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                  </div>
                </div>
              </div>
            </div>
          @endif

<section class="section wb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-wrapper">
                    <div class="row">
                        <form class="form-wrapper" method="POST" action="/validasiSertifikat/cari">
                        <div class="col-lg-12">
                            <h4>Cek Keaslian Sertifikat</h4>
                            <p>Kami memiliki fitur untuk mengecek keaslian Sertifikat Kompetensi yang dimiliki peserta didik kami.</p>
                        </div>
                            {{ csrf_field() }}
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="kd_sertifikat" name="kd_sertifikat" placeholder="Masukkan Kode Sertifikat" required>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary">Cari<i class="fa fa-search"></i></button>
                            </div>
                            <br>
                            @if($sertifikat!=null)
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th>Kode Sertifikat</th>
                                            <th>Nama Program</th>
                                            <th>Nama Peserta Didik</th>
                                            <th>Tanggal Terbit</th>
                                            <th>Tanggal Kedaluarsa</th>
                                        </tr>
                                        <tr>
                                            <td>{{$sertifikat->kd_sertifikat}}</td>
                                            <td>{{App\Member::where('kd_pengguna', App\PendaftaranProgram::where('kd_pendaftaran', $sertifikat->kd_pendaftaran)->value('kd_pengguna'))->value('nama_lengkap')}}</td>
                                            <td>{{App\ProgramPelatihan::where('kd_program', App\SkemaPelatihan::where('kd_skema', App\PendaftaranProgram::where('kd_pendaftaran', $sertifikat->kd_pendaftaran)->value('kd_skema'))->value('kd_program'))->value('nama_program')}}</td>
                                            <td>{{$sertifikat->tgl_terbit}}</td>
                                            <td>{{$sertifikat->tgl_kadaluarsa}}</td>
                                        </tr>
                                    </table>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div><!-- end page-wrapper -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection