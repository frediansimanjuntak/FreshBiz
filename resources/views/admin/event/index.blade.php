@extends('layouts.admin.index')
@section('title', 'Events')
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/admin/lib/highlightjs/github.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<!-- /style -->
@endsection

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="#">Event</a>
        <span class="breadcrumb-item active">List</span>
        </nav>
    </div><!-- br-pageheader -->
    @if($errors->first('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
            <span><strong>Error!</strong> {{$errors->first('error')}}</span>
        </div><!-- d-flex -->
    </div><!-- alert -->
    @endif
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Event</h4>
        <p class="mg-b-0">List all data</p>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">Title</th>
                <th class="wd-10p">Category</th>
                <th class="wd-10p">Event Organizer</th>
                <th class="wd-15p">Date</th>
                <th class="wd-10p">Time</th>
                <th class="wd-10p">Location</th>
                <th class="wd-10p"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($events as $event)                    
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->event_category->name}}</td>
                    <td>{{$event->event_organizer->company_name}}</td>
                    <td>{{$event->date_start.' until '.$event->date_end}}</td>
                    <td>{{$event->time_start.' until '.$event->time_end}}</td>  
                    <td>{{$event->location}}</td>                                 
                    <td>
                        <form action="{{route('admin.event.func.delete')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}                                                
                            <input type="hidden" name="category" value="{{$event->key}}">
                            <a href="{{ route('admin.event.view.update')}}?event={{$event->key}}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>    
                    </td>
                </tr>
                @endforeach                
            </tbody>
            </table>
        </div><!-- table-wrapper -->  
    </div><!-- br-pagebody -->
    @include('layouts.admin.footer')
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('pagespecificscripts')
<script src="{{ asset ('assets/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset ('assets/admin/lib/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset ('assets/admin/lib/datatables-responsive/dataTables.responsive.js') }}"></script>
<script src="{{ asset ('assets/admin/lib/select2/js/select2.min.js') }}"></script>

<script src="{{ asset ('assets/admin/js/bracket.js') }}"></script>
<script>
    $(function(){
        'use strict';

        $('#datatable1').DataTable({
            responsive: true,
            language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
            }
        });
        // Select2
        $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
</script>
@endsection