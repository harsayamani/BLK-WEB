@extends('Admin/masterAdmin')

@section('judul_tab', 'Dashboard-AdminBLK')
    
@section('active_menu_dashboard', 'active')

@section('content')
<div class="content">
    <!-- Animated -->
    <div class="animated fadeIn">
        <!-- Widgets  -->
        <div class="row">
            <div class="col-sm-12 mb-4">
                <div class="card-group">
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-users"></i>
                            </div>

                            <div class="h4 mb-0">
                                @if ($member_count!=null)
                                    <span class="count">{{$member_count}}</span>
                                @else
                                    <span class="count">0</span>
                                @endif
                            </div>

                            <small class="text-muted text-uppercase font-weight-bold">Member</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="h4 mb-0">
                                @if ($peserta_count!=null)
                                    <span class="count">{{$peserta_count}}</span>
                                @else
                                    <span class="count">0</span>
                                @endif
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Peserta Pelatihan</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="h4 mb-0">
                                @if ($lulus_count!=null)
                                    <span class="count">{{$lulus_count}}</span>
                                @else
                                    <span class="count">0</span>
                                @endif
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Lulus</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-users"></i>
                            </div>
                            <div class="h4 mb-0">
                                @if ($tidak_lulus_count!=null)
                                    <span class="count">{{$tidak_lulus_count}}</span>
                                @else
                                    <span class="count">0</span>
                                @endif
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Tidak Lulus</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="h4 mb-0">
                                @if ($lulus_count!=null && $pendaftar_count!=null)
                                    <span class="count">{{($lulus_count/$pendaftar_count)*100}}</span>%
                                @else
                                    <span class="count">0</span>%
                                @endif
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Persentase Lulus</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                    <div class="card col-md-6 no-padding ">
                        <div class="card-body">
                            <div class="h1 text-muted text-right mb-4">
                                <i class="fa fa-pie-chart"></i>
                            </div>
                            <div class="h4 mb-0">
                                @if ($tidak_lulus_count!=null && $pendaftar_count!=null)
                                    <span class="count">{{($tidak_lulus_count/$pendaftar_count)*100}}</span>%
                                @else
                                    <span class="count">0</span>%
                                @endif
                            </div>
                            <small class="text-muted text-uppercase font-weight-bold">Persentase Tidak Lulus</small>
                            <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Widgets -->
        <!-- cal -->
        <div class="orders">
            <div class="row">
                <div class="col-xl-12">
                  <!-- Calender Chart Weather  -->
                  <div class="row">
                      <div class="col-md-12 col-lg-12">
                          <div class="card">
                              <div class="card-body">
                                  <!-- <h4 class="box-title">Chandler</h4> -->
                                  <div class="calender-cont widget-calender">
                                      <div id="calendar"></div>
                                  </div>
                              </div>
                          </div><!-- /.card -->
                      </div>
                  </div>
                  <!-- /Calender Chart Weather -->
                </div>  <!-- /.col-lg-8 -->

            </div>
        </div>
        <!-- /.cal -->
    </div>
    <!-- .animated -->
</div>
@endsection

