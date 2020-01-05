@extends('Member/masterMember')

@section('title_bar', 'Akun | SIBLK')
    
@section('active4', 'active')

@section('title_page', 'Akun')

@section('section')

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

<section class="forms"> 
    <div class="container-fluid">
      <div class="row">
        <!-- Form Elements -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Data Diri</h3>
            </div>
            <div class="card-body">
              <form class="form-horizontal" method="POST" action="/member/akun/ubah">
                {{ csrf_field() }}
                <div class="row form-group" hidden>
                    <div class="col col-md-3">
                        <label for="number-input" class=" form-control-label">Kode Pengguna</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <input readonly type="number" id="kd_pengguna" name="kd_pengguna" placeholder="Masukkan ID Kelas " class="form-control" value="{{$member->kd_pengguna}}">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-12">
                        <label><strong>INFORMASI MEMBER</strong></label>
                    </div>
                </div>
               
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nomor KTP</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="number" id="nomor_ktp" name="nomor_ktp" placeholder="Masukkan Nomor KTP" class="form-control" value="{{$member->nomor_ktp}}" required>
                        <small class="form-text text-muted">Tuliskan nomor KTP!</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nama Lengkap</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" class="form-control" value="{{$member->nama_lengkap}}" required>
                        <small class="form-text text-muted">Tuliskan nama lengkap!</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text_input" class=" form-control-label">Jenis Kelamin</label></div>
                    <div class="col-12 col-md-9">
                        <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                            <option value="">---Pilih Jenis Kelamin---</option>
                            <option value="L" @if($member->jenis_kelamin == "L") selected @endif>Laki-Laki</option>
                            <option value="P" @if($member->jenis_kelamin == "P") selected @endif>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="tempat_lahir" class=" form-control-label">Tempat Lahir</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="tempat_lahir" id="tempat_lahir">
                            <option value="">---Pilih Tempat Lahir---</option>
                            @foreach($kota as $city)
                            <option value="{{$city->id}}" @if($member->tempat_lahir == $city->id) selected @endif>{{$city->type." ".$city->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tanggal Lahir</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" class="form-control" value="{{$member->tgl_lahir}}" required readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text_input" class=" form-control-label">Pendidikan Terakhir</label></div>
                    <div class="col-12 col-md-9">
                        <select name="pend_terakhir" id="pend_terakhir" class="form-control">
                            <option value="">---Pilih Pendidikan Terakhir---</option>
                            <option value="SD/MI" @if($member->pend_terakhir == "SD/MI") selected @endif>SD/MI</option>
                            <option value="SMP/MTS" @if($member->pend_terakhir == "SMP/MTS") selected @endif>SMP/MTS</option>
                            <option value="SMA/MA/SMK" @if($member->pend_terakhir == "SMA/MA/SMK") selected @endif>SMA/MA/SMK</option>
                            <option value="D3" @if($member->pend_terakhir == "D3") selected @endif>D3</option>
                            <option value="D4" @if($member->pend_terakhir == "D4") selected @endif>D4</option>
                            <option value="S1" @if($member->pend_terakhir == "S1") selected @endif>S1</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tahun Ijazah</label>
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="number" id="thn_ijazah" name="thn_ijazah" placeholder="Masukkan Tahun Ijazah" class="form-control" value="{{$member->thn_ijazah}}" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text_input" class=" form-control-label">Provinsi</label></div>
                    <div class="col-12 col-md-9">
                        <select name="provinsi" id="provinsi" class="form-control">
                            <option value="">---Pilih Provinsi---</option>
                            @foreach($provinsi as $province)
                            <option value="{{$province->id}}" @if($member->provinsi == $province->id) selected @endif>{{$province->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Kabupatan/Kota</label></div>
                    <div class="col-12 col-md-9">
                        <select name="kabupaten_kota" id="kabupaten_kota" data-dependent="kodepos" class="form-control">\
                            <option value="" selected>---Pilih Kabupaten/Kota---</option>
                            <option value="{{$member->kabupaten_kota}}" selected>{{App\Cities::where('id', $member->kabupaten_kota)->value('type')." ".App\Cities::where('id', $member->kabupaten_kota)->value('nama')}}</option>
                        </select>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Alamat Lengkap</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea id="alamat_lengkap" name="alamat_lengkap" placeholder="Masukkan Alamat Lengkap" class="form-control" required>{{$member->alamat_lengkap}}</textarea>
                        <small class="form-text text-muted">Tuliskan alamat lengkap!</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Kode Pos</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="kodepos" name="kodepos" placeholder="" class="form-control" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nomor Kontak</label>
                    </div>
                    <div class="col-12 col-md-9">
                    <input type="text" id="nomor_kontak" name="nomor_kontak" placeholder="Masukkan nomor kontak" class="form-control" required value="{{$member->nomor_kontak}}">
                        <small class="form-text text-muted">Tuliskan nomor kontak!</small>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-12">
                        <label><strong>INFORMASI PAKAIAN</strong></label>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Ukuran Baju</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="radio">
                                <label for="s" class="form-check-label ">
                                    <input type="radio" id="s" name="ukuran_baju" value="S" class="form-check-input">S
                                </label>
                            </div>
                            <div class="radio">
                                <label for="m" class="form-check-label ">
                                    <input type="radio" id="m" name="ukuran_baju" value="M" class="form-check-input">M
                                </label>
                            </div>
                            <div class="radio">
                                <label for="l" class="form-check-label ">
                                    <input type="radio" id="l" name="ukuran_baju" value="L" class="form-check-input">L
                                </label>
                            </div>
                            <div class="radio">
                                <label for="xl" class="form-check-label ">
                                    <input type="radio" id="xl" name="ukuran_baju" value="XL" class="form-check-input">XL
                                </label>
                            </div>
                            <div class="radio">
                                <label for="xxl" class="form-check-label ">
                                    <input type="radio" id="xxl" name="ukuran_baju" value="XXL" class="form-check-input">XXL
                                </label>
                            </div>
                            <div class="radio">
                                <label for="lainnya" class="form-check-label ">
                                    <input type="text" id="ukuran_baju_lain" name="ukuran_baju_lain" placeholder="Lainnya" class="form-control" value="{{$member->ukuran_baju}}">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label class=" form-control-label">Ukuran Sepatu</label>
                    </div>
                    <div class="col col-md-9">
                        <div class="form-check">
                            <div class="radio">
                                <label for="ukuran_sepatu1" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu1" name="ukuran_sepatu" value="36" class="form-check-input">36
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu2" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu2" name="ukuran_sepatu" value="37" class="form-check-input">37
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu3" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu3" name="ukuran_sepatu" value="38" class="form-check-input">38
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu4" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu4" name="ukuran_sepatu" value="39" class="form-check-input">39
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu5" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu5" name="ukuran_sepatu" value="40" class="form-check-input">40
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu6" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu6" name="ukuran_sepatu" value="41" class="form-check-input">41
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu7" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu7" name="ukuran_sepatu" value="42" class="form-check-input">42
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu8" class="form-check-label ">
                                    <input type="radio" id="ukuran_sepatu8" name="ukuran_sepatu" value="43" class="form-check-input">43
                                </label>
                            </div>
                            <div class="radio">
                                <label for="ukuran_sepatu_lain" class="form-check-label ">
                                <input type="text" id="ukuran_sepatu_lain" name="ukuran_sepatu_lain" placeholder="Lainnya" class="form-control" value="{{$member->ukuran_sepatu}}">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="row form-group">
                    <div class="col col-12">
                        <label><strong>MINAT</strong></label>
                    </div>
                </div> --}}

                {{-- <div class="row ">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Minat</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" id="js-example-basic-multiple" name="minat[]" multiple="multiple" style="width: 100%;">
                            @foreach ($minat as $min)
                                <option value="{{$min->kd_minat}}">{{$min->minat}}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="row form-group">
                    <div class="col col-12">
                        <label><strong>INFORMASI AKUN</strong></label>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Username</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="username" name="username" class="form-control"  placeholder="Masukkan Username" value="{{$member->username}}" required>
                    </div>
                </div>

                <div class="row form-group" hidden>
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Password</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password" value="{{$member->password}}" readonly>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="email" placeholder="Masukkan email" name="email" class="form-control" value="{{$member->email}}" required>
                    </div>
                </div>

                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-4 offset-sm-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('#tgl_lahir').datepicker({
        format: 'dd mmm yyyy',
        uiLibrary: 'bootstrap4'
    });
</script>

<script language="JavaScript" type="text/JavaScript">
    $('#provinsi').on('change', function(e){
    console.log(e);
    var prov_id = e.target.value; 
    //ajax
    $.get('/ajax-kota/' + prov_id, function(data){
        $('#kabupaten_kota').empty();
            $.each(data, function(index, kotaObj){
                $('#kabupaten_kota').append('<option value="'+kotaObj.id+'">'+kotaObj.type+" "+kotaObj.nama+'</option>');
            });
        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#kabupaten_kota').on('change', function(){
            $.ajax({
                url: "/ajax-kodepos",
                type:"POST",
                data : {"_token": "{{ csrf_token() }}",
                "id":$(this).val()},
                dataType: "json",
                success: function(res){
                    console.log(res.kodepos);
                    $('#kodepos').val(res.kodepos);
                }
            })
        })
        // init
        $('#kabupaten_kota').change();
    });
</script>

@endsection