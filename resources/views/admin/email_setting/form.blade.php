@extends('layouts.admin.index')
@section('title', 'Email Setting')
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/admin/lib/highlightjs/github.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<!-- /style -->
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Create ':'Edit '}} Event Categories</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active">Email</li>
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
    @if($errors->first('error'))
    <div class="alert alert-danger"> <i class="ti-user"></i><strong>Error!</strong> {{$errors->first('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    @endif
    <!-- Row -->
    <div class="row">
            <div class="col-lg-6">
                <div class="card card-outline-info">
                    <div class="card-header">
                        <h4 class="m-b-0 text-white">Add New form</h4>
                    </div>
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.setting.email.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('from_name', 'From Name', ['class' => 'control-label']); !!}
                                            {!! Form::text('from_name', $email_setting ? $email_setting->from_name : null,['class' => 'form-control', 'placeholder' => 'Enter email from name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('from_name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('from_name') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('from_email', 'From Email', ['class' => 'control-label']); !!}
                                            {!! Form::text('from_email', $email_setting ? $email_setting->from_email : null ,['class' => 'form-control', 'placeholder' => 'Enter email address', 'autofocus', 'required']); !!}
                                            @if ($errors->has('from_email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('from_email') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->  
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('feedback_email_to', 'Feedback Email to', ['class' => 'control-label']); !!}
                                            {!! Form::text('feedback_email_to', $email_setting ? $email_setting->feedback_email_to : null ,['class' => 'form-control', 'placeholder' => 'Enter feedback email to', 'autofocus', 'required']); !!}
                                            @if ($errors->has('feedback_email_to'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('feedback_email_to') }}</strong>
                                                </span> 
                                            @endif
                                        </div>
                                    </div>
                                    <!--/span-->
                                </div>
                                <!--/row-->                                   
                            </div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> Save</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- Row -->
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->                
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->


<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="#">Setting</a>
        <span class="breadcrumb-item active">Email</span>
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
        <h4 class="tx-gray-800 mg-b-5">Email Setting</h4>
    </div>
    
    <div class="col-md-6">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    {!! Form::open(['route' => 'admin.setting.email.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-layout form-layout-4">
                        <div class="row">
                            {!! Form::label('from_name', 'From Name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('from_name', $email_setting ? $email_setting->from_name : null,['class' => 'form-control', 'placeholder' => 'Enter email from name', 'autofocus', 'required']); !!}
                            @if ($errors->has('from_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('from_name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('from_email', 'From Email', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('from_email', $email_setting ? $email_setting->from_email : null ,['class' => 'form-control', 'placeholder' => 'Enter email address', 'autofocus', 'required']); !!}
                            @if ($errors->has('from_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('from_email') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->   
                        <div class="row mg-t-20">
                            {!! Form::label('feedback_email_to', 'Feedback Email to', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('feedback_email_to', $email_setting ? $email_setting->feedback_email_to : null ,['class' => 'form-control', 'placeholder' => 'Enter feedback email to', 'autofocus', 'required']); !!}
                            @if ($errors->has('feedback_email_to'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('feedback_email_to') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->     
                        <div class="row mg-t-20">
                            {!! Form::label('mandrill_key', 'Mandrill Key', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('mandrill_key', $email_setting ? $email_setting->mandrill_key : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('mandrill_key'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('mandrill_key') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row --> 
                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Save':'Update'}}</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                    {!! Form::close() !!}
                </div><!-- col-6 -->                
            </div><!-- col-6 -->
        </div><!-- row -->            
    </div><!-- br-pagebody -->
    </div>
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