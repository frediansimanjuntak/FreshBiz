@extends('layouts.admin.index')
@section('title', 'Events')
@section('pagespecificstyles') 
<!-- style -->

<!-- /style -->
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Event Detail</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Event</li>
            <li class="breadcrumb-item active">Detail</li>
        </ol>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- Row -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <center class="m-t-30"> <img src="../assets/images/users/5.jpg" class="img-circle" width="150" />
                        <h4 class="card-title m-t-10">{{$event->event_organizer->company_name}}</h4>
                        <h6 class="card-subtitle">{{$event->event_organizer->user->name}}</h6>
                        {{-- <div class="row text-center justify-content-md-center">
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium">254</font></a></div>
                            <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-picture"></i> <font class="font-medium">54</font></a></div>
                        </div> --}}
                    </center>
                </div>
                <div>
                    <hr> </div>
                <div class="card-body"> 
                    <small class="text-muted">Email address </small>
                        <h6>{{$event->event_organizer->email}}</h6> 
                    <small class="text-muted p-t-30 db">Phone</small>
                        <h6>{{$event->event_organizer->phone}}</h6> 
                    <small class="text-muted p-t-30 db">Address</small>
                        <h6>{{$event->event_organizer->address}}</h6>
                    <small class="text-muted p-t-30 db">Social Profile</small>
                    <br/>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>
                    <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs profile-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Detail</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Attendance</a> </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.event.view.update')}}?event={{$event->key}}" role="tab">Edit</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>{{$event->title}}</h3>
                                </div> 
                            </div>                               
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="{{asset ('storage/'.$event->image)}}" class="img-responsive radius" />
                                </div> 
                            </div>                               
                            <hr>
                            <div class="row">
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Location</strong>
                                    <br>
                                    <p class="text-muted">{{$event->location}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Category</strong>
                                    <br>
                                    <p class="text-muted">{{$event->event_category->name}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Date</strong>
                                    <br>
                                    <p class="text-muted">{{$event->date_start.' until '.$event->date_end}}</p>
                                </div>
                                <div class="col-md-3 col-xs-6 b-r"> <strong>Time</strong>
                                    <br>
                                    <p class="text-muted">{{$event->time_start.' until '.$event->time_end}}</p>
                                </div>
                            </div>                              
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="m-t-10">{!!$event->description!!}</p>
                                </div> 
                            </div>                             
                        </div>
                    </div>
                    <!--second tab-->
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="row">                            
                            <div class="col-12"> 
                                <div class="card-body">
                                    <div class="table-responsive m-t-20">
                                        <table id="myTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                            </thead>
                                            <tbody>                  
                                                <tr>
                                                    <td>fred_dummy</td>
                                                    <td>fred_dummy@gmail.com</td> 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>   
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
    </div>
    <!-- Row -->
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->    
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
{{-- 
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel br-profile-page">

    <div class="card shadow-base bd-0 rounded-0 widget-4">
    <div class="card-header ht-75">
        <div class="hidden-xs-down">
        <a href="" class="mg-r-10"><span class="tx-medium">0</span> attendance</a>
        </div>
        <div class="tx-14 hidden-xs-down">
        <a href="{{ route('admin.event.view.update')}}?event={{$event->key}}" class="btn btn-primary"><i class="icon ion-edit"></i> Edit</a>
        </div>
    </div><!-- card-header -->
    <div class="card-body">
        <h4 class="tx-normal tx-roboto tx-white">{{$event->title}}</h4>
        <p class="mg-b-25">by {{$event->event_organizer->company_name}}</p>
        </p>
    </div><!-- card-body -->
    </div><!-- card -->

    <div class="ht-70 bg-gray-100 pd-x-20 d-flex align-items-center justify-content-center shadow-base">
    <ul class="nav nav-outline active-info align-items-center flex-row" role="tablist">
        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#posts" role="tab">Detail</a></li>
        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#photos" role="tab">Gallery</a></li>
    </ul>
    </div>

    <div class="tab-content br-profile-body">
    <div class="tab-pane fade active show" id="posts">
        <div class="row">
        <div class="col-lg-8">
            <div class="media-list bg-white rounded shadow-base">                
                <div class="media pd-20 pd-xs-30">
                    <div class="media-body">                        
                        <img src="{{asset ('storage/'.$event->image)}}" class="img-fluid mg-b-10" alt="" width="800px">  
                    </div><!-- media-body -->
                </div><!-- media -->
                <div class="media pd-20 pd-xs-30">
                    <div class="media-body">
                    <p class="mg-b-20">{!!$event->description!!}</p>
                    </div><!-- media-body -->
                </div><!-- media -->                
            </div><!-- card -->
            
        </div><!-- col-lg-8 -->
        <div class="col-lg-4 mg-t-30 mg-lg-t-0">
            <div class="card pd-20 pd-xs-30 shadow-base bd-0">
            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Event Information</h6>
            
            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Event Category</label>
            <p class="tx-inverse mg-b-25">{{$event->event_category->name}}</p>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Event Date</label>
            <p class="tx-info mg-b-25">{{$event->date_start.' until '.$event->date_end}}</p>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Event Time</label>
            <p class="tx-info mg-b-25">{{$event->time_start.' until '.$event->time_end}}</p>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Event Location</label>
            <p class="tx-inverse mg-b-25">{{$event->location}} </p>

            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Contact Information</h6>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Phone Number</label>
            <p class="tx-info mg-b-25">{{$event->event_organizer->phone}}</p>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Email Address</label>
            <p class="tx-inverse mg-b-25">{{$event->event_organizer->email}}</p>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-2">Office Address</label>
            <p class="tx-inverse mg-b-25">{{$event->event_organizer->address}} </p>

            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-25">Other Information</h6>

            <label class="tx-10 tx-uppercase tx-mont tx-medium tx-spacing-1 mg-b-5">Tags</label>
            <ul class="list-unstyled profile-skills">
                @foreach ($event->tags as $tag)                    
                    <li><span>{{$tag}}</span></li>
                @endforeach
            </ul>
            </div><!-- card -->

            <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
            <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-13 mg-b-30">Attendance List</h6>
            <div class="media-list">
                <div class="media align-items-center pd-b-10">
                <img src="http://via.placeholder.com/280x280" class="wd-45 rounded-circle" alt="">
                <div class="media-body mg-x-15 mg-xs-x-20">
                    <h6 class="mg-b-2 tx-inverse tx-14">Marilyn Tarter</h6>
                    <p class="mg-b-0 tx-12">@marilyntarter</p>
                </div><!-- media-body -->
                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                </a>
                </div><!-- media -->
                <div class="media align-items-center pd-y-10">
                <img src="http://via.placeholder.com/280x280" class="wd-45 rounded-circle" alt="">
                <div class="media-body mg-x-15 mg-xs-x-20">
                    <h6 class="mg-b-2 tx-inverse tx-14">Belinda Connor</h6>
                    <p class="mg-b-0 tx-12">@bconnor</p>
                </div><!-- media-body -->
                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                </a>
                </div><!-- media -->
                <div class="media align-items-center pd-y-10">
                <img src="http://via.placeholder.com/280x280" class="wd-45 rounded-circle" alt="">
                <div class="media-body mg-x-15 mg-xs-x-20">
                    <h6 class="mg-b-2 tx-inverse tx-14">Deborah Miner</h6>
                    <p class="mg-b-0 tx-12">@dminer</p>
                </div><!-- media-body -->
                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                </a>
                </div><!-- media -->
                <div class="media align-items-center pd-y-10">
                <img src="http://via.placeholder.com/280x280" class="wd-45 rounded-circle" alt="">
                <div class="media-body mg-x-15 mg-xs-x-20">
                    <h6 class="mg-b-2 tx-inverse tx-14">Theodore Grestin</h6>
                    <p class="mg-b-0 tx-12">@theodore</p>
                </div><!-- media-body -->
                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                </a>
                </div><!-- media -->
                <div class="media align-items-center pd-y-10">
                <img src="http://via.placeholder.com/280x280" class="wd-45 rounded-circle" alt="">
                <div class="media-body mg-x-15 mg-xs-x-20">
                    <h6 class="mg-b-2 tx-inverse tx-14">Andrew Wiggins</h6>
                    <p class="mg-b-0 tx-12">@awiggins</p>
                </div><!-- media-body -->
                <a href="#" class="btn btn-outline-secondary btn-icon rounded-circle mg-r-5">
                    <div><i class="icon ion-android-person-add tx-16"></i></div>
                </a>
                </div><!-- media -->
            </div><!-- media-list -->
            </div><!-- card -->
        </div><!-- col-lg-4 -->
        </div><!-- row -->
    </div><!-- tab-pane -->
    <div class="tab-pane fade" id="photos">
        <div class="row">
            <div class="col-lg-12">
                <div class="card pd-20 pd-xs-30 shadow-base bd-0 mg-t-30">
                    <h6 class="tx-gray-800 tx-uppercase tx-semibold tx-14 mg-b-30">Recent Photos</h6>
                    <div class="row row-xs">
                        <div class="col-6 col-sm-4 col-md-3"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10 mg-sm-t-0"><img src="http://via.placeholder.com/600x600" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10 mg-md-t-0"><img src="http://via.placeholder.com/600x600" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/1000x1000" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                        <div class="col-6 col-sm-4 col-md-3 mg-t-10"><img src="http://via.placeholder.com/300x300" class="img-fluid" alt=""></div>
                    </div><!-- row -->
                </div><!-- card -->
            </div><!-- col-lg-8 -->        
        </div><!-- row -->
    </div><!-- tab-pane -->
    </div><!-- br-pagebody -->

</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## --> --}}

@endsection

@section('pagespecificscripts')
<!-- This is data table -->
<script src="{{ asset ('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- end - This is for export functionality only -->
<script>
$(document).ready(function() {
    $('#myTable').DataTable();
    $(document).ready(function() {
        var table = $('#example').DataTable({
            "columnDefs": [{
                "visible": false,
                "targets": 2
            }],
            "order": [
                [2, 'asc']
            ],
            "displayLength": 25,
            "drawCallback": function(settings) {
                var api = this.api();
                var rows = api.rows({
                    page: 'current'
                }).nodes();
                var last = null;
                api.column(2, {
                    page: 'current'
                }).data().each(function(group, i) {
                    if (last !== group) {
                        $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                        last = group;
                    }
                });
            }
        });
    });
});
</script>
@endsection