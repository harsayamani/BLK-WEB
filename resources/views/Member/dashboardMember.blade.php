@extends('Member/masterMember')

@section('title_bar', 'Dashboard | SIBLK')
    
@section('active1', 'active')

@section('title_page', 'Dashboard')

@section('section')

@if($pendaftaran != null && $pendaftaran->status == 3)
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pendaftaran Pelatihan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body alert-warning">
        <p>Anda tidak lulus, silahkan daftar kembali</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
@endif

<section class="dashboard-counts no-padding-bottom">
    <div class="container-fluid">
        @if ($member->tempat_lahir == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->tgl_lahir == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->jenis_kelamin == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->alamat_lengkap == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->provinsi == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->kabupaten_kota == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->kodepos == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->pend_terakhir == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->thn_ijazah == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->nomor_kontak == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->ukuran_baju == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @elseif ($member->ukuran_sepatu == null)
        <div class="alert alert-warning" role="alert">
            Data diri anda belum lengkap silahkan lengkapi terlebih dahulu!
        </div>
        @else
        <div class="alert alert-success" role="alert">
            Data diri sudah lengkap
        </div>
        @endif
    </div>
</section>

<!-- Member Section-->
<section class="client no-padding-top">
    <div class="container-fluid">
      <div class="row">

        <!-- Profile -->
        <div class="col-lg-6">
          <div class="client card">
            <div class="card-body text-center">
              <div class="client-title">
                <h3>{{Session::get('nama_lengkap')}}</h3><span>Peserta</span><a href="/member/akun">Lengkapi Data Diri</a>
              </div>
            </div>
          </div>
          <div class="overdue card">
            <div class="card-body">
              <center><h3>Program Pelatihan</h3></center>
              @if ($pendaftaran == null || $pendaftaran->count()<1)
                <div class="number text-center">Belum Mendaftar</div>
              @elseif($pendaftaran->status == 3)
                <div class="number text-center">Anda Dapat Mendaftar Kembali</div>
              @else
                <div class="number text-center">{{$program->nama_program}}</div>
              @endif
            </div>
          </div>
        </div>

        <!-- Status -->
        <div class="col-lg-6">
            <div class="work-amount card">
              <div class="card-body">
                <center><h3>Status Peserta</h3></center>
                <div class="chart text-center">
                    @if ($pendaftaran == null || $pendaftaran->count()<1)
                        <div class="text"><b>Belum Mendaftar</b></div>
                        <canvas id="pieChart"></canvas>
                    @else
                        @if ($pendaftaran->status == 0)
                            <div class="text"><b>Waiting List</b></div>
                            <canvas id="pieChart"></canvas>
                        @elseif ($pendaftaran->status == 1)
                            <div class="text"><b>Peserta</b></div>
                            <canvas id="pieChart"></canvas>
                        @elseif ($pendaftaran->status == 2)
                            <div class="text"><b>Lulus/Alumni</b></div>
                            <canvas id="pieChart"></canvas>
                        @elseif ($pendaftaran->status == 3)
                            <div class="text"><b>Tidak Lulus</b></div>
                            <canvas id="pieChart"></canvas>
                        @endif
                    @endif
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
</section>

@if($skema_all!=null)
<section class="updates no-padding-top">
  <div class="container-fluid">
    <div class="row">
      <!-- Recent Updates-->
      <div class="col-md-12">
        <div class="recent-updates card">
          <div class="card-header">
            <h3 class="h4">Jadwal Kegiatan</h3>
          </div>
          <div class="card-body no-padding">
            @foreach($skema_all as $skm)
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Pendaftaran Dibuka</h5>
                </div>
              </div>
            <div class="date text-right"><strong>{{$skm->tgl_awal_pendaftaran}}</strong></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Pendaftaran Ditutup</h5>
                </div>
              </div>
              <div class="date text-right"><strong>{{$skm->tgl_akhir_pendaftaran}}</strong></div>
            </div>
            <!-- Item        -->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Pengumuman</h5>
                </div>
              </div>
              <div class="date text-right"><strong>{{$skm->tgl_seleksi}}</strong></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Mulai Pelaksanaan</h5>
                </div>
              </div>
              <div class="date text-right"><strong>{{$skm->tgl_awal_pelaksanaan}}</strong></div>
            </div>
            <!-- Item-->
            <div class="item d-flex justify-content-between">
              <div class="info d-flex">
                <div class="icon"><i class="icon-rss-feed"></i></div>
                <div class="title">
                  <h5>Selesai</h5>
                </div>
              </div>
              <div class="date text-right"><strong>{{$skm->tgl_akhir_pelaksanaan}}</strong></div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
  
@endsection