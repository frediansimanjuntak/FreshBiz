@extends('layouts.admin.index')
@section('title', 'Website Setting')
@section('pagespecificstyles') 
<!-- style -->

<link href="{{ asset ('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<!-- /style -->
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">Website Setting</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item">Setting</li>
            <li class="breadcrumb-item active">Website</li>
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
    <div class="alert alert-danger"> <i class="ti-user"></i><strong> Error!</strong> {{$errors->first('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    @endif
    <!-- Row -->
    <div class="row">
            <div class="col-lg-6">
                <div class="card card-outline-info">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.setting.website.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}    <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Website Name', ['class' => 'control-label']); !!}
                                            {!! Form::text('name', $website_setting ? $website_setting->name : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('name'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('name') }}</strong>
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
                                            {!! Form::label('logo_light', 'Primary Logo Light', ['class' => 'control-label']); !!}
                                            {!! Form::text('logo_light', $website_setting ? $website_setting->logo_light : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('logo_light'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('logo_light') }}</strong>
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
                                            {!! Form::label('logo_dark', 'Primary Logo Dark', ['class' => 'control-label']); !!}
                                            {!! Form::text('logo_dark', $website_setting ? $website_setting->logo_dark : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('logo_dark'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('logo_dark') }}</strong>
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
                                            {!! Form::label('logo_small_light', 'Secondary Logo Light', ['class' => 'control-label']); !!}
                                            {!! Form::text('logo_small_light', $website_setting ? $website_setting->logo_small_light : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('logo_small_light'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('logo_small_light') }}</strong>
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
                                            {!! Form::label('logo_small_dark', 'Secondary Logo Dark', ['class' => 'control-label']); !!}
                                            {!! Form::text('logo_small_dark', $website_setting ? $website_setting->logo_small_dark : null ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('logo_small_dark'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('logo_small_dark') }}</strong>
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
                                            {!! Form::label('meta', 'Meta Description', ['class' => 'control-label']); !!}
                                            <div class="tags-default">
                                                {!! Form::text('meta', $website_setting ? $website_setting->meta ? $website_setting->meta : null : null ,['class' => 'form-control', 'placeholder' => 'Add meta', 'autofocus', 'data-role' => 'tagsinput']); !!}
                                            </div>
                                            @if ($errors->has('meta'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('meta') }}</strong>
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
<!-- ============================================================== -->
@endsection

@section('pagespecificscripts')
<script src="{{ asset ('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
@endsection