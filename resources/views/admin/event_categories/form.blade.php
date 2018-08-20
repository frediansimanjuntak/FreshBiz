@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event_categories.view.create')?'Create Event Category':'Edit Event Category')
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
        <a class="breadcrumb-item" href="#">Event Categories</a>
        <span class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Create':'Edit'}}</span>
        </nav>
    </div><!-- br-pageheader -->
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
        <h4 class="tx-gray-800 mg-b-5">Event Categories</h4>
        <p class="mg-b-0">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Create New Data':'Edit Data'}}</p>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-6">
                    <div class="form-layout form-layout-4">
                    <div class="row">
                        <label class="col-sm-4 form-control-label">Name: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <input type="text" class="form-control" placeholder="Enter Name">
                        </div>
                    </div><!-- row -->                    
                    <div class="row mg-t-20">
                        <label class="col-sm-4 form-control-label">Description: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                        <textarea rows="2" class="form-control" placeholder="Enter Description"></textarea>
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30">
                        <button class="btn btn-info">Submit</button>
                        <button class="btn btn-secondary">Cancel</button>
                    </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </div><!-- col-6 -->                
            </div><!-- col-6 -->
        </div><!-- row -->            
    </div><!-- br-pagebody -->
    @include('layouts.admin.footer')
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
@endsection

@section('pagespecificscripts')
<script src="{{ asset ('assets/admin/lib/highlightjs/highlight.pack.js') }}"></script>
<script src="{{ asset ('assets/admin/lib/select2/js/select2.min.js') }}"></script>

<script src="{{ asset ('assets/admin/js/bracket.js') }}"></script>
<script>
    $(function(){
        'use strict'

        $('.form-layout .form-control').on('focusin', function(){
        $(this).closest('.form-group').addClass('form-group-active');
        });

        $('.form-layout .form-control').on('focusout', function(){
        $(this).closest('.form-group').removeClass('form-group-active');
        });

        // Select2
        $('#select2-a, #select2-b').select2({
        minimumResultsForSearch: Infinity
        });

        $('#select2-a').on('select2:opening', function (e) {
        $(this).closest('.form-group').addClass('form-group-active');
        });

        $('#select2-a').on('select2:closing', function (e) {
        $(this).closest('.form-group').removeClass('form-group-active');
        });

    });
</script>
@endsection