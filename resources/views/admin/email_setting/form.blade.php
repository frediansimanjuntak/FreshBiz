@extends('layouts.admin.index')
@section('title', 'Email Setting')
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
        <h3 class="text-themecolor">Email Setting</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
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
    <div class="alert alert-danger"> <i class="ti-user"></i><strong> Error!</strong> {{$errors->first('error')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>
    @endif
    <!-- Row -->
    <div class="row">
            <div class="col-lg-6">
                <div class="card card-outline-info">
                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.setting.email.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('from_name', 'From Name', ['class' => 'control-label']); !!}
                                            {!! Form::text('from_name', $email_setting ? $email_setting->from_name : null,['class' => 'form-control', 'placeholder' => 'Enter email from name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('from_name'))
                                                <span class="text-danger">
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
                                                <span class="text-danger">
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
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('feedback_email_to') }}</strong>
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
                                            {!! Form::label('mandrill_key', 'Mandrill Key', ['class' => 'control-label']); !!}
                                            {!! Form::text('mandrill_key', $email_setting ? $email_setting->mandrill_key : null,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                            @if ($errors->has('mandrill_key'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('mandrill_key') }}</strong>
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

@endsection