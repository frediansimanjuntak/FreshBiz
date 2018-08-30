@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event_organisers.view.create')?'Create Event Organisers':'Edit Event Organisers' ) 
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset ('assets/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />
<!-- /style -->
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{{(\Request::route()->getName()=='admin.event_organisers.view.create')?'Create ':'Edit '}} Event Organizer</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item">Event Organizer</li>
            <li class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event_organisers.view.create')?'Create ':'Edit '}}</li>
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
                    @if(\Request::route()->getName()=='admin.event_organisers.view.create') 
                        {!! Form::open(['route' => 'admin.event_organisers.func.create', 'method' => 'POST', 'id' => 'event_organisers_form', 'enctype' => 'multipart/form-data']) !!}
                    @elseif(\Request::route()->getName()=='admin.event_organisers.view.update')
                        {!! Form::open(['route' => 'admin.event_organisers.func.update', 'method' => 'PUT', 'id' => 'event_organiserss_form', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::hidden('eo_key', $eo->key) }}
                    @endif 
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('company_name', 'Company Name', ['class' => 'control-label']); !!}
                                        {!! Form::text('company_name', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->company_name ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                        @if ($errors->has('company_name'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('company_name') }}</strong>
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
                                        {!! Form::label('address', 'Address', ['class' => 'control-label']); !!}
                                        {!! Form::text('address', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->address ,['class' => 'form-control', 'placeholder' => 'Enter address', 'autofocus', 'required']); !!}
                                        @if ($errors->has('address'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
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
                                        {!! Form::label('phone', 'Phone', ['class' => 'control-label']); !!}
                                        {!! Form::text('phone', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->phone ,['class' => 'form-control', 'placeholder' => 'Enter phone', 'autofocus', 'required']); !!}
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('phone') }}</strong>
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
                                        {!! Form::label('email', 'Email', ['class' => 'control-label']); !!}
                                        {!! Form::email('email', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->email ,['class' => 'form-control', 'placeholder' => 'Enter email', 'autofocus', 'required']); !!}
                                        @if ($errors->has('email'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
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
                                        {!! Form::label('website', 'Website', ['class' => 'control-label']); !!}
                                        {!! Form::text('website', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->website ,['class' => 'form-control', 'placeholder' => 'Enter website', 'autofocus', 'required']); !!}
                                        @if ($errors->has('website'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('website') }}</strong>
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
                                        {!! Form::label('user_key', 'User', ['class' => 'control-label']); !!}
                                        <select class="select2 form-control custom-select" name="user_key" data-placeholder="Choose user" style="width: 100%; height:36px;">
                                            @if(\Request::route()->getName()=='admin.event_organisers.view.update')
                                                <option value={{$eo->user_key}}>{{$eo->user->name}}</option>  
                                                <option label="Choose one"></option>
                                            @else
                                                <option label="Choose one"></option>
                                            @endif
                                            @foreach ($users as $user)    
                                                @if(\Request::route()->getName()=='admin.event_organisers.view.update')  
                                                    @if($user->key != $eo->user_key)  
                                                        <option value={{$user->key}}>{{$user->name}}</option>
                                                    @endif
                                                @else
                                                    <option value={{$user->key}}>{{$user->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('user_key'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('user_key') }}</strong>
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
                                        {!! Form::label('description', 'Description', ['class' => 'control-label']); !!}
                                        {!! Form::textarea('description',\Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->description,['class'=>'textarea_editor form-control', 'rows' => 10, 'placeholder' => 'Enter Description']) !!}
                                        @if ($errors->has('description'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('description') }}</strong>
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
<script src="{{ asset ('assets/plugins/select2/dist/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('assets/plugins/html5-editor/wysihtml5-0.3.0.js') }}"></script>
<script src="{{ asset ('assets/plugins/html5-editor/bootstrap-wysihtml5.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {       
        $(".select2").select2();  
        $('.textarea_editor').wysihtml5();      
    });
</script>
@endsection