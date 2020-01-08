@extends('Member/masterMember')

@section('title_bar', 'Pendaftaran Pelatihan | SIBLK')
    
@section('active3', 'active')

@section('title_page', 'Pendaftaran Pelatihan')

@section('section')

<section class="section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Persyaratan dan Ketentuan</h3>
                      </div>
                    <div class="card-body" style="padding : 50px">
                        <p>{!!$persyaratan!!}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Form Pendaftaran</h3>
                  </div>
                  <div class="card-body">
                    {{-- <p>Lorem ipsum dolor sit amet consectetur.</p> --}}
                    <form method="POST" action="/member/pendaftaranPelatihan/daftar">
                        {{ csrf_field() }}
                        <div class="row form-group" hidden>
                            <div class="col col-md-3">
                                <label for="number-input" class=" form-control-label">Kode Pendaftaran</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="kd_pendaftaran" name="kd_pendaftaran" placeholder="Masukkan Kode Pendaftaran" class="form-control" 
                                @if($pendaftaran->count()>0)
                                    value="{{App\PendaftaranProgram::all()->last()->kd_pendaftaran+1}}" 
                                @else
                                    value="2000000001" 
                                @endif 
                                required>
                            </div>
                        </div>
                        <div class="row form-group" hidden>
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Member</label></div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="kd_pengguna" name="kd_pengguna" class="form-control" value="{{$kd_pengguna}}" readonly>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Pelatihan yang diikuti</label></div>
                            <div class="col-12 col-md-9">
                                <select name="kd_skema" id="kd_skema" class="form-control">
                                    <option value="">---Pilih Skema Pelatihan---</option>
                                    @foreach ($skema as $skm)
                                        @if($skm->kuota - App\PendaftaranProgram::where('kd_skema', $skm->kd_skema)->get()->count()!=0)
                                        <option value="{{$skm->kd_skema}}">{{App\Gelombang::where('kd_gelombang', $skm->kd_gelombang)->value('nama_gelombang')." - ".App\ProgramPelatihan::where('kd_program', $skm->kd_program)->value('nama_program')}} sisa {{$skm->kuota - App\PendaftaranProgram::where('kd_skema', $skm->kd_skema)->get()->count()}} kuota</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                                <button type="submit" class="btn btn-primary">Daftar</button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection