@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event_categories.view.create')?'Create Event Category':'Edit Event Category')
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
        <h3 class="text-themecolor">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Create ':'Edit '}} Event Categories</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Home</a></li>
            <li class="breadcrumb-item">Event Categories</li>
            <li class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event_categories.view.create')?'Create ':'Edit '}}</li>
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
                        @if(\Request::route()->getName()=='admin.event_categories.view.create') 
                            {!! Form::open(['route' => 'admin.event_categories.func.create', 'method' => 'POST', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                        @elseif(\Request::route()->getName()=='admin.event_categories.view.update')
                            {!! Form::open(['route' => 'admin.event_categories.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                            {{ Form::hidden('category', $category->key) }}
                        @endif  
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {!! Form::label('name', 'Name', ['class' => 'control-label']); !!}
                                            {!! Form::text('name', \Request::route()->getName()=='admin.event_categories.view.create' ? null : $category->name ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
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
                                            {!! Form::label('description', 'Description', ['class' => 'control-label']); !!}
                                            {!! Form::textarea('description',\Request::route()->getName()=='admin.event_categories.view.create' ? null : $category->description,['class'=>'form-control', 'rows' => 2, 'placeholder' => 'Enter Description']) !!}
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

@endsection