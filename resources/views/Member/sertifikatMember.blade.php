@extends('Member/masterMember')

@section('title_bar', 'Sertifikat | SIBLK')
    
@section('active5', 'active')

@section('title_page', 'Sertifikat')

@section('section')

<section class="tables">   
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Sertifikat Kelulusan</h3>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>QR Code</th>
                        <th>Kode Sertifikat</th>
                        <th>Member</th>
                        <th>Program</th>
                        <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($sertifikat as $sertifikat)                        
                    <tr>
                        <td>{{$i+=1}}</td>
                        <td>
                            <a href="/admin/dataMember/sertifikat/lembarPengesahan/{{$sertifikat->kd_sertifikat}}">
                                <i class="fa fa-qrcode"></i>&nbsp;
                            </a>
                        </td>
                        <td>{{$sertifikat->kd_sertifikat}}</td>
                        <td>{{App\Member::where('kd_pengguna', $sertifikat->kd_pengguna)->value('nama_lengkap')}}</td>
                        <td>{{App\ProgramPelatihan::where('kd_program', $sertifikat->kd_program)->value('nama_program')}}</td>
                        <td>
                            <a href="{{$sertifikat->gambar_sertifikat}}" type="button" class="btn btn-primary btn-sm">
                                <i class="fa fa-certificate"></i>&nbsp;
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
</section>

@endsection