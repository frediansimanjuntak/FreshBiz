@extends('layouts.admin.index')
@section('title', (\Request::route()->getName()=='admin.event.view.create')?'Create Event':'Edit Event' ) 
@section('pagespecificstyles') 
<!-- style -->
<link href="{{ asset ('assets/plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset ('assets/plugins/html5-editor/bootstrap-wysihtml5.css') }}" />

<link href="{{ asset ('assets/plugins/switchery/dist/switchery.min.css') }}" rel="stylesheet" />
<link href="{{ asset ('assets/plugins/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" />
<link href="{{ asset ('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" />
<link href="{{ asset ('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" />

<link href="{{ asset ('assets/plugins/clockpicker/dist/jquery-clockpicker.min.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/plugins/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="{{ asset ('assets/plugins/dropify/dist/css/dropify.min.css') }}">
<!-- /style -->
@endsection

@section('content')
<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h3 class="text-themecolor">{{(\Request::route()->getName()=='admin.event.view.create')?'Create ':'Edit '}} Event</h3>
    </div>
    <div class="col-md-7 align-self-center">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
            <li class="breadcrumb-item">Event</li>
            <li class="breadcrumb-item active">{{(\Request::route()->getName()=='admin.event.view.create')?'Create ':'Edit '}}</li>
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
        <div class="col-lg-12">
            <div class="card card-outline-success">
                <div class="card-header">
                    <h4 class="m-b-0 text-white">Add New form</h4>
                </div>
                <div class="card-body">
                    @if(\Request::route()->getName()=='admin.event.view.create') 
                        {!! Form::open(['route' => 'admin.event.func.create', 'method' => 'POST', 'id' => 'event_form', 'enctype' => 'multipart/form-data']) !!}
                    @elseif(\Request::route()->getName()=='admin.event.view.update')
                        {!! Form::open(['route' => 'admin.event.func.update', 'method' => 'PUT', 'id' => 'events_form', 'enctype' => 'multipart/form-data']) !!}
                        {{ Form::hidden('event_key', $event->key) }}
                    @endif 
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('title', 'Title', ['class' => 'control-label']); !!}
                                        {!! Form::text('title', \Request::route()->getName()=='admin.event.view.create' ? null : $event->title ,['class' => 'form-control', 'placeholder' => 'Enter name', 'autofocus', 'required']); !!}
                                        @if ($errors->has('title'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('title') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('event_category_key', 'Event Category', ['class' => 'control-label']); !!}
                                        <select class="select2 form-control custom-select" name="event_category_key" data-placeholder="Choose event category" style="width: 100%; height:36px;">
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
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('event_category_key') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('eo_key', 'Event Organizer', ['class' => 'control-label']); !!}
                                        <select class="select2 form-control custom-select" name="eo_key" data-placeholder="Choose event organizer" style="width: 100%; height:36px;">
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
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('location', 'Location', ['class' => 'control-label']); !!}
                                        {!! Form::text('location', \Request::route()->getName()=='admin.event.view.create' ? null : $event->location ,['class' => 'form-control', 'placeholder' => 'Enter location', 'autofocus', 'required']); !!}
                                        @if ($errors->has('location'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('location') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row--> 
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">                                           
                                                {!! Form::label('date_start', 'Start Date', ['class' => 'control-label']); !!}
                                                {!! Form::date('date_start', \Request::route()->getName()=='admin.event.view.create' ? null : $event->date_start ,['class' => 'form-control', 'placeholder' => 'Enter Date', 'autofocus', 'required']); !!}                                                
                                                @if ($errors->has('date_start'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('date_start') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>                                        
                                            <div class="col-md-6">                                           
                                                {!! Form::label('date_end', 'End Date', ['class' => 'control-label']); !!}
                                                {!! Form::date('date_end', \Request::route()->getName()=='admin.event.view.create' ? null : $event->date_end ,['class' => 'form-control', 'placeholder' => 'Enter Date', 'autofocus', 'required']); !!}
                                                @if ($errors->has('date_end'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('date_end') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-6">  
                                                {!! Form::label('time_start', 'Start Time', ['class' => 'control-label']); !!}
                                                <div class="input-group clockpicker">
                                                    {!! Form::text('time_start', \Request::route()->getName()=='admin.event.view.create' ? null : $event->time_start ,['class' => 'form-control', 'placeholder' => 'hh:mm', 'autofocus', 'required']); !!}
                                                </div>
                                                @if ($errors->has('time_start'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('time_start') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>                                        
                                            <div class="col-md-6">                                          {!! Form::label('time_end', 'End Time', ['class' => 'control-label']); !!}
                                                <div class="input-group clockpicker">
                                                    {!! Form::text('time_end', \Request::route()->getName()=='admin.event.view.create' ? null : $event->time_end ,['class' => 'form-control', 'placeholder' => 'hh:mm', 'autofocus', 'required']); !!}
                                                </div>
                                                @if ($errors->has('time_end'))
                                                    <span class="text-danger">
                                                        <strong>{{ $errors->first('time_end') }}</strong>
                                                    </span> 
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <!--/row-->  
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        {!! Form::label('tags', 'Location', ['class' => 'control-label']); !!}
                                        <div class="tags-default">
                                        {!! Form::text('tags', \Request::route()->getName()=='admin.event.view.create' ? null : $event->tags ,['class' => 'form-control', 'placeholder' => 'Add tags', 'autofocus', 'data-role' => 'tagsinput']); !!}
                                        </div>
                                        @if ($errors->has('tags'))
                                            <span class="text-danger">
                                                <strong>{{ $errors->first('locattagsion') }}</strong>
                                            </span> 
                                        @endif
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('image', 'Image', ['class' => 'control-label']); !!}
                                        <input type="file" id="input-file-now" name="attachment" class="dropify" data-default-file="{{\Request::route()->getName()=='admin.event.view.create' ? null : asset ('storage/'.$event->image)}}"/>
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
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        {!! Form::label('description', 'Description', ['class' => 'control-label']); !!}
                                        {!! Form::textarea('description',\Request::route()->getName()=='admin.event.view.create' ? null : $event->description,['class'=>'textareas_editor form-control', 'rows' => 10, 'placeholder' => 'Enter Description']) !!}
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
<script src="{{ asset ('assets/plugins/bootstrap-select/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset ('assets/plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset ('assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
<script src="{{ asset ('assets/plugins/dff/dff.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset ('assets/plugins/multiselect/js/jquery.multi-select.js') }}"></script>
<script src="{{ asset ('assets/plugins/clockpicker/dist/jquery-clockpicker.min.js') }}"></script>

<script src="{{ asset ('assets/plugins/dropify/dist/js/dropify.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {       
        $(".select2").select2();  
        $(".textareas_editor").wysihtml5();    
        $('.dropify').dropify(); 
    });
     // Clock pickers
     $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
</script>
@endsection