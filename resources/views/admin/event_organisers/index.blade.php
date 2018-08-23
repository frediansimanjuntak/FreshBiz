@extends('layouts.admin.index')
@section('title', 'Event Organisers')
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
        <a class="breadcrumb-item" href="#">Event Organisers</a>
        <span class="breadcrumb-item active">List</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Event Organisers</h4>
        <p class="mg-b-0">List all data</p>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">Company Name</th>
                <th class="wd-15p">User</th>
                <th class="wd-10p">Address</th>
                <th class="wd-10p">Phone</th>
                <th class="wd-10p">Email</th>
                <th class="wd-10p">Website</th>
                <th class="wd-10p">Description</th>
                <th class="wd-10p"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event_organisers as $eo)                    
                <tr>
                    <td>{{$eo->company_name}}</td>
                    <td>{{$eo->user->name}}</td>
                    <td>{{$eo->address}}</td>  
                    <td>{{$eo->phone}}</td> 
                    <td>{{$eo->email}}</td> 
                    <td>{{$eo->website}}</td>   
                    <td>{{$eo->description}}</td>                                 
                    <td>
                        {{-- <form action="{{route('admin.event_categories.func.delete')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}                                                
                            <input type="hidden" name="category" value="{{$category->key}}">
                            <a href="{{ route('admin.event_categories.view.update')}}?category={{$category->key}}" class="btn btn-primary">Edit</a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>     --}}
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