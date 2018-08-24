@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event_organisers.view.create')?'Create Event Organisers':'Edit Event Organisers' ) 
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/admin/lib/highlightjs/github.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/medium-editor/default.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
<!-- /style -->
@endsection

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="#">Event Organisers</a>
        <span class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event_organisers.view.create')?'Create':'Edit'}}</span>
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
        <h4 class="tx-gray-800 mg-b-5">Event Organises</h4>
        <p class="mg-b-0">{{(\Request::route()->getName()=='admin.event_organisers.view.create')?'Create New Data':'Edit Data'}}</p>
    </div>
    
    <div class="col-md-12">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <div class="row">
                <div class="col-xl-12">
                    @if(\Request::route()->getName()=='admin.event_organisers.view.create') 
                        {!! Form::open(['route' => 'admin.event_organisers.func.create', 'method' => 'POST', 'id' => 'event_organisers_form', 'enctype' => 'multipart/form-data']) !!}
                    @elseif(\Request::route()->getName()=='admin.event_organisers.view.update')
                        {!! Form::open(['route' => 'admin.event_organisers.func.update', 'method' => 'PUT', 'id' => 'event_organiserss_form', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::hidden('eo_key', $eo->key) }}
                    @endif  
                    <div class="form-layout form-layout-4">
                        <div class="row">
                            {!! Form::label('company_name', 'Company Name', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('company_name', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->company_name ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                            @if ($errors->has('company_name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('company_name') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->    
                        <div class="row mg-t-20">
                            {!! Form::label('address', 'Address', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('address', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->address ,['class' => 'form-control', 'placeholder' => 'Enter address', 'autofocus', 'required']); !!}
                            @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->    
                        <div class="row mg-t-20">
                            {!! Form::label('phone', 'Phone', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('phone', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->phone ,['class' => 'form-control', 'placeholder' => 'Enter phone', 'autofocus', 'required']); !!}
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->    
                        <div class="row mg-t-20">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('email', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->email ,['class' => 'form-control', 'placeholder' => 'Enter email', 'autofocus', 'required']); !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->           
                        <div class="row mg-t-20">
                            {!! Form::label('website', 'Website', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('website', \Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->website ,['class' => 'form-control', 'placeholder' => 'Enter website', 'autofocus', 'required']); !!}
                            @if ($errors->has('website'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('website') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->    
                        <div class="row mg-t-20">
                            {!! Form::label('user_key', 'User', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search" name="user_key" data-placeholder="Choose one (with searchbox)">
                                    @if(\Request::route()->getName()=='admin.event_organisers.view.create')
                                        @foreach ($users as $user)      
                                            <option value={{$user->key}}>{{$user->name}}</option>
                                        @endforeach
                                    @else
                                        @foreach ($users as $user)    
                                            @if($user->key != $eo->user_key)  
                                                <option value={{$user->key}}>{{$user->name}}</option>
                                            @endif
                                        @endforeach    
                                    @endif
                                </select>
                                @if ($errors->has('user_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_key') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('description', 'Description', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <div id="summernote">Hello, universe!</div>
                                {{-- {!! Form::textarea('description',\Request::route()->getName()=='admin.event_organisers.view.create' ? null : $eo->description,['class'=>'form-control', 'rows' => 2, 'placeholder' => 'Enter Description']) !!} --}}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div>  
                        <div class="form-layout-footer mg-t-30">
                            <button type="submit" class="btn btn-info">{{(\Request::route()->getName()=='admin.event_organisers.view.create')?'Save':'Update'}}</button>
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
<script src="{{ asset ('assets/admin/lib/medium-editor/medium-editor.js') }}"></script>

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
<script>
    $(function(){
      'use strict';

      // Inline editor
      var editor = new MediumEditor('.editable');

      // Summernote editor
      $('#summernote').summernote({
        height: 150,
        tooltip: false
      })
    });
  </script>
@endsection