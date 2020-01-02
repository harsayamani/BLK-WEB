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
                                @if ($lulus_count!=null && $peserta_count!=null)
                                    <span class="count">{{($lulus_count/$peserta_count)*100}}</span>%
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
                                @if ($tidak_lulus_count!=null && $peserta_count!=null)
                                    <span class="count">{{($tidak_lulus_count/$peserta_count)*100}}</span>%
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
        <!-- Calender Chart Weather  -->
        <div class="row">
            <div class="col-md-12">
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
        <!-- Modal - Calendar - Add New Event -->
        <div class="modal fade none-border" id="event-modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add New Event</strong></h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success save-event waves-effect waves-light">Create event</button>
                        <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#event-modal -->
        <!-- Modal - Calendar - Add Category -->
        <div class="modal fade none-border" id="add-category">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title"><strong>Add a category </strong></h4>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Category Name</label>
                                    <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="control-label">Choose Category Color</label>
                                    <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                        <option value="success">Success</option>
                                        <option value="danger">Danger</option>
                                        <option value="info">Info</option>
                                        <option value="pink">Pink</option>
                                        <option value="primary">Primary</option>
                                        <option value="warning">Warning</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- /#add-category -->
    </div>
    <!-- .animated -->
</div>
@endsection

