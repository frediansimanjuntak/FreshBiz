@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event.view.create')?'Create Event':'Edit Event' ) 
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/admin/lib/highlightjs/github.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/datatables/jquery.dataTables.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/medium-editor/medium-editor.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/medium-editor/default.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/summernote/summernote-bs4.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/css/dropzone.css') }}" rel="stylesheet">
<!-- /style -->
@endsection

@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="br-pageheader pd-y-15 pd-l-20">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="index.html">Dashboard</a>
        <a class="breadcrumb-item" href="#">Event</a>
        <span class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event.view.create')?'Create':'Edit'}}</span>
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
        <h4 class="tx-gray-800 mg-b-5">Event</h4>
        <p class="mg-b-0">{{(\Request::route()->getName()=='admin.event.view.create')?'Create New Data':'Edit Data'}}</p>
    </div>
    
    <div class="col-md-12">
    <div class="br-pagebody">
        <div class="br-section-wrapper">                    
            @if(\Request::route()->getName()=='admin.event.view.create') 
                {!! Form::open(['route' => 'admin.event.func.create', 'method' => 'POST', 'id' => 'event_form', 'enctype' => 'multipart/form-data']) !!}
            @elseif(\Request::route()->getName()=='admin.event.view.update')
                {!! Form::open(['route' => 'admin.event.func.update', 'method' => 'PUT', 'id' => 'events_form', 'enctype' => 'multipart/form-data']) !!}
                {{ Form::hidden('event_key', $event->key) }}
            @endif  
            <div class="row">
                <div class="col-xl-6 mg-b-30">
                    <div class="form-layout">                        
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Detail Event</h6>
                        <div class="row">
                            {!! Form::label('title', 'Title', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('title', \Request::route()->getName()=='admin.event.view.create' ? null : $event->title ,['class' => 'form-control', 'placeholder' => 'Enter title', 'autofocus', 'required']); !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->                             
                        <div class="row mg-t-20">
                            {!! Form::label('eo_key', 'Event Organizer', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search" name="eo_key" data-placeholder="Choose event organizer">
                                    @if(\Request::route()->getName()=='admin.event.view.update')  
                                        <option value={{$event->eo_key}}>{{$event->event_organizer->company_name}}</option>  
                                    @else                                        
                                        <option label="Choose event organizer"></option>
                                    @endif
                                    @foreach ($event_organisers as $eo)    
                                        @if(\Request::route()->getName()=='admin.event.view.update') 
                                            @if($event->eo_key != $eo->key)  
                                                <option value={{$eo->key}}>{{$eo->company_name}}</option>
                                            @endif
                                        @else
                                            <option value={{$eo->key}}>{{$eo->company_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('eo_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('eo_key') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('event_category_key', 'Event Category', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search" name="event_category_key" data-placeholder="Choose event category">
                                    @if(\Request::route()->getName()=='admin.event.view.update')
                                        <option value={{$event->event_category_key}}>{{$event->event_category->name}}</option>  
                                    @else                                        
                                        <option label="Choose event organizer"></option>
                                    @endif
                                    @foreach ($event_categories as $event_category)    
                                        @if(\Request::route()->getName()=='admin.event.view.update')  
                                            @if($event_category->key != $event->event_category_key)  
                                                <option value={{$event_category->key}}>{{$event_category->name}}</option>
                                            @endif
                                        @else
                                            <option value={{$event_category->key}}>{{$event_category->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('event_category_key'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('event_category_key') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div><!-- row -->     
                        <div class="row mg-t-20">
                            {!! Form::label('location', 'Location', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('location', \Request::route()->getName()=='admin.event.view.create' ? null : $event->location ,['class' => 'form-control', 'placeholder' => 'Enter location', 'autofocus', 'required']); !!}
                            @if ($errors->has('location'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->    
                        <div class="row mg-t-20">
                            {!! Form::label('tags', 'Tags', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            {!! Form::text('tags', \Request::route()->getName()=='admin.event.view.create' ? null : $event->tags ,['class' => 'form-control', 'placeholder' => 'Enter Tags', 'data-role'=>'tagsinput', 'autofocus', 'required']); !!}
                            @if ($errors->has('tags'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('tags') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div><!-- row -->  
                        <div class="row mg-t-20">
                            {!! Form::label('date', 'Date Start / End', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                            {!! Form::date('date_start', \Request::route()->getName()=='admin.event.view.create' ? null : $event->date_start ,['class' => 'form-control', 'placeholder' => 'Enter date', 'autofocus', 'required']); !!}
                            @if ($errors->has('date_start'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('date_start') }}</strong>
                                </span> 
                            @endif
                            </div>     
                            <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                {!! Form::date('date_end', \Request::route()->getName()=='admin.event.view.create' ? null : $event->date_end ,['class' => 'form-control', 'placeholder' => 'Enter date', 'autofocus', 'required']); !!}
                                @if ($errors->has('date_end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date_end') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div><!-- row -->   
                        <div class="row mg-t-20">
                            {!! Form::label('time', 'Time Start / End', ['class' => 'col-sm-4 form-control-label']); !!}
                            <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                            {!! Form::time('time_start', \Request::route()->getName()=='admin.event.view.create' ? null : $event->time_start ,['class' => 'form-control', 'placeholder' => 'Enter date', 'autofocus', 'required']); !!}
                            @if ($errors->has('time_start'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time_start') }}</strong>
                                </span> 
                            @endif
                            </div>     
                            <div class="col-sm-4 mg-t-10 mg-sm-t-0">
                                {!! Form::time('time_end', \Request::route()->getName()=='admin.event.view.create' ? null : $event->time_end ,['class' => 'form-control', 'placeholder' => 'Enter date', 'autofocus', 'required']); !!}
                                @if ($errors->has('time_end'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time_end') }}</strong>
                                    </span> 
                                @endif
                            </div>
                        </div><!-- row -->                                              
                    </div><!-- form-layout -->
                </div><!-- col-6 -->        
                
                <div class="col-xl-6 mg-b-30">
                    <div class="form-layout"> 
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Upload Image</h6>
                        <p class="mg-b-30 tx-gray-600">Upload an image for banner. <span style="color: red">*(800px X 500px)</span></p>  
                        <div class="row mg-t-20">
                            <div class="col-sm-12 mg-t-5 mg-sm-t-0">    
                                <img id="preview" src="{{\Request::route()->getName()=='admin.event.view.create' ? asset ('assets/admin/img/img12.jpg') : asset ('storage/'.$event->image)}}" class="img-responsive" height="250" width="400px"/><br/>
                                <input type="file" id="image" name="attachment" style="display: none;"/>
                                <br>
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span> 
                                @endif                                                            
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-sm-12 mg-t-5 mg-sm-t-0">    
                                <a href="javascript:changeProfile()" class="btn btn-primary">Upload</a>
                                <a href="javascript:removeImage()" class="btn btn-danger">Remove</a>
                            </div>
                        </div>
                    </div><!-- form-layout -->
                </div><!-- col-6 --> 
                <div class="col-xl-12">
                    <div class="form-layout">  
                        <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Description</h6>
                        <p class="mg-b-30 tx-gray-600">Describe the detail of event.</span></p> 
                        
                        <div class="row mg-t-20">
                            <div class="col-sm-12 mg-t-10 mg-sm-t-0">                                
                            {!! Form::textarea('description',\Request::route()->getName()=='admin.event.view.create' ? null : $event->description,['id'=>'summernote', 'class'=>'form-control', 'rows' => 2, 'placeholder' => 'Enter Description']) !!}
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span> 
                            @endif
                            </div>
                        </div> 
                        <div class="form-layout-footer mg-t-30 text-right">
                            <button type="submit" class="btn btn-info">{{(\Request::route()->getName()=='admin.event.view.create')?'Save':'Update'}}</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </div><!-- col-6 --> 
            </div><!-- row -->
            {!! Form::close() !!}    
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
<script src="{{ asset ('assets/admin/lib/bootstrap-tagsinput/bootstrap-tagsinput.js') }}"></script>
<script src="{{ asset ('assets/admin/js/dropzone.js') }}"></script>

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
        height: 250,
        tooltip: false
        })
    });
</script>
<script>
        function changeProfile() {
            $('#image').click();
        }
        $('#image').change(function () {
            var imgPath = this.value;
            var ext = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
            if (ext == "gif" || ext == "png" || ext == "jpg" || ext == "jpeg")
                readURL(this);
            else
                alert("Please select image file (jpg, jpeg, png).")
        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.readAsDataURL(input.files[0]);
                reader.onload = function (e) {
                    $('#preview').attr('src', e.target.result);
    //              $("#remove").val(0);
                };
            }
        }
        function removeImage() {
            $('#preview').attr('src', '{{asset ('assets/admin/img/img12.jpg')}}');
    //      $("#remove").val(1);
        }
    </script>

@endsection