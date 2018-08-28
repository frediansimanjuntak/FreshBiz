@extends('layouts.admin.index')
@section('title', 'Events')
@section('pagespecificstyles') 
<!-- style -->

<!-- /style -->
@endsection

@section('content')
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
        {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#" role="tab">Favorites</a></li>
        <li class="nav-item hidden-xs-down"><a class="nav-link" data-toggle="tab" href="#" role="tab">Settings</a></li> --}}
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
<!-- ########## END: MAIN PANEL ########## -->

@endsection

@section('pagespecificscripts')
<script src="{{ asset ('assets/admin/js/bracket.js') }}"></script>
@endsection