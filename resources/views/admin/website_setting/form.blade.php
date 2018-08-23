@extends('layouts.admin.index')
@section('title', 'Website Setting')
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
        <a class="breadcrumb-item" href="#">Setting</a>
        <span class="breadcrumb-item active">Website</span>
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
        <h4 class="tx-gray-800 mg-b-5">Website Setting</h4>
    </div>
    
    <div class="col-md-6">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    {!! Form::open(['route' => 'admin.setting.website.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-layout form-layout-4">
                        <div class="row">
                            {!! Form::label('name', 'Website Name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('name', $website_setting ? $website_setting->name : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('logo_light', 'Primary Logo Light', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('logo_light', $website_setting ? $website_setting->logo_light : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('logo_light'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('logo_light') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->   
                        <div class="row mg-t-20">
                            {!! Form::label('logo_dark', 'Primary Logo Dark', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('logo_dark', $website_setting ? $website_setting->logo_dark : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('logo_dark'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('logo_dark') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->     
                        <div class="row mg-t-20">
                                {!! Form::label('logo_small_light', 'Secondary Logo Light', ['class' => 'col-sm-4 form-control-label']); !!}
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                {!! Form::text('logo_small_light', $website_setting ? $website_setting->logo_small_light : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                @if ($errors->has('logo_small_light'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo_small_light') }}</strong>
                                    </span> 
                                @endif
                                </div>
                            </div><!-- row -->   
                            <div class="row mg-t-20">
                                {!! Form::label('logo_small_dark', 'Secondary Logo Dark', ['class' => 'col-sm-4 form-control-label']); !!}
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                {!! Form::text('logo_small_dark', $website_setting ? $website_setting->logo_small_dark : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                @if ($errors->has('logo_small_dark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('logo_small_dark') }}</strong>
                                    </span> 
                                @endif
                                </div>
                            </div><!-- row -->                                
                        <div class="row mg-t-20">
                            {!! Form::label('meta', 'Meta Description', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('meta', $website_setting ? $website_setting->meta : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('meta'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('meta') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div>
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