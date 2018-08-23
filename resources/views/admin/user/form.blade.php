@extends('layouts.admin.index')
@section('title', 'User Create')
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
        <span class="breadcrumb-item active">Create</span>
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
        <p class="mg-b-0">Create new data</p>
    </div>
    
    <div class="col-md-6">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    {!! Form::open(['route' => 'admin.user.func.create', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-layout form-layout-4">
                        <div class="row">
                            {!! Form::label('first_name', 'First name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('first_name', null,['class' => 'form-control', 'placeholder' => 'Enter first name', 'autofocus', 'required']); !!}
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('last_name', 'Last name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('last_name', null ,['class' => 'form-control', 'placeholder' => 'Enter last name', 'autofocus', 'required']); !!}
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->   
                        <div class="row mg-t-20">
                            {!! Form::label('reg_email', 'Email', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('reg_email', null ,['class' => 'form-control', 'placeholder' => 'Enter email', 'autofocus', 'required']); !!}
                            @if ($errors->has('reg_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('reg_email') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->     
                        <div class="row mg-t-20">
                            {!! Form::label('password', 'Password', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::password('password', null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row --> 
                        <div class="row mg-t-20">
                            {!! Form::label('password_confirmation', 'Password Confirmation', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::password('password_confirmation', null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row --> 
                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info">Save</button>
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