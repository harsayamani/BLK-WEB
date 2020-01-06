@extends('Admin/masterAdmin')

@section('judul_tab', 'Pesan - AdminBLK')
    
@section('active_menu_pesan', 'active')

@section('content')

<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Pesan SMS</strong>
                    </div>
                
                    <div class="card-body">
                        <div class="default-tab">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Kirim Pesan Member</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Kirim Pesan Nomor</a>
                                </div>
                            </nav>
                            <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <form class="form-horizontal" role="form" method="post" action="/admin/kelolaPesan/kirim">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}
                                        <div class="form-group">
                                            <label for="member" class="control-label">Member</label>
                                            <select class="js-example-basic-single" name="member[]" id="member" multiple="multiple" style="width: 100%;">
                                                @foreach ($member as $mem)
                                                    <option value="{{$mem->nomor_kontak}}">{{$mem->nama_lengkap}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="pesan" class="control-label">Pesan</label>
                                            <textarea class="form-control" name="pesan" id="pesan" required></textarea>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="form-group">                                                
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Kirim Pesan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <form class="form-horizontal" role="form" method="post" action="/admin/kelolaPesan/kirimNomor">
                                        {{ csrf_field() }}
                                        {{ method_field('post') }}

                                        <div class="form-group">
                                            <label for="nomor" class="control-label">Nomor</label>
                                            <input class="form-control" name="nomor" id="nomor" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="pesan" class="control-label">Pesan</label>
                                            <textarea class="form-control" type="number" name="pesan" id="pesan" required></textarea>
                                        </div>

                                        <br>
                                        <br>
                                        <div class="form-group">                                                
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Kirim Pesan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content -->
<div class="clearfix"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
    $('.js-example-basic-single').select2({
        theme: "classic",
    });
</script>
  
@endsection