@extends('layouts.admin.index')
@section('title', 'User list')
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
        <a class="breadcrumb-item" href="#">User</a>
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
        <h4 class="tx-gray-800 mg-b-5">User</h4>
        <p class="mg-b-0">List all data</p>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
        <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
            <thead>
                <tr>
                <th class="wd-15p">Name</th>
                <th class="wd-15p">Email</th>
                <th class="wd-10p">Phone</th>
                <th class="wd-10p">QS user_id</th>
                <th class="wd-10p">Disabled</th>
                <th class="wd-10p">Administrator</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)                    
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->qs_user_id}}</td>
                    <td>
                        <form action="{{route('admin.user.func.update')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="disabled" value="{{$user->disabled == true ? 0 : 1}}">
                            
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn {{$user->disabled == true ? 'btn-primary' : 'btn-danger'}}">{{$user->disabled == true ? 'enable' : 'disable'}}</button>
                        </form>    
                    </td>   
                    <td>
                        <form action="{{route('admin.user.func.update')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="administrator" value="{{$user->administrator == true ? 0 : 1}}">
                            
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn {{$user->administrator == true ? 'btn-danger' : 'btn-primary'}}">{{$user->administrator == true ? 'disable' : 'enable'}}</button>
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