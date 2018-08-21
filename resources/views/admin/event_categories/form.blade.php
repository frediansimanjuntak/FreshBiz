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
    @if($errors->first('error'))
    {{$errors->first('error')}}
    @endif
    
    <div class="col-md-6">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    @if(\Request::route()->getName()=='admin.event_categories.view.create') 
                        {!! Form::open(['route' => 'admin.event_categories.func.create', 'method' => 'POST', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                    @elseif(\Request::route()->getName()=='admin.event_categories.view.update')
                        {!! Form::open(['route' => 'admin.event_categories.func.update', 'method' => 'PUT', 'id' => 'event_categories_form', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::hidden('category', $category->key) }}
                    @endif  
                    <div class="form-layout form-layout-4">
                        <div class="row">
                            {!! Form::label('name', 'Name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('name', \Request::route()->getName()=='admin.event_categories.view.create' ? null : $category->name ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->                    
                        <div class="row mg-t-20">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::textarea('description',\Request::route()->getName()=='admin.event_categories.view.create' ? null : $category->description,['class'=>'form-control', 'rows' => 2, 'placeholder' => 'Enter Description']) !!}
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
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