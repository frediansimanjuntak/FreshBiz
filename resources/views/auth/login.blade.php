@extends('layouts.front.index')
@section('title', 'Sign In')

@section('content')
<section class="contact-section">  
    <div class="auto-container">
        <div class="row clearfix">
            <!--Form Column-->     
            <div class="form-column col-md-6 col-sm-12 col-xs-12">  
                @if ($errors->has('login_error'))
                    <span class="err">
                        <strong>*Caution: {{ $errors->first('login_error') }}</strong>
                    </span>
                @endif
                <div class="sec-title">
                    <h2>Sign in</h2>
                </div>
                <div class="text">Welcome To Kaiju Event. Please Login if you have an account</div>
                <!--Contact Form-->
                <div class="contact-form">
                    {!! Form::open(['route' => 'login', 'method' => 'POST', 'id' => 'login_form']) !!}
                        <div class="clearfix">
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                {!! Form::text('email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
                            </div>           
                            <div class="form-group text-right"> 
                                <p><a href="https://account.quarkspark.com/user/login">Forgot password?</a></p>
                                {!! Form::submit('Sign In', ['class' => 'theme-btn submit-btn']); !!}
                            </div>                            
                        </div>                        
                    {!! Form::close() !!}
                </div>
            </div> 
            
            <div class="form-column col-md-2 col-sm-12 col-xs-12">
                <div class="vl"></div>
            </div>
            <div class="form-column col-md-4 col-sm-12 col-xs-12">
                @if ($errors->has('register_error'))
                    <span class="err">
                        <strong>*Caution: {{ $errors->first('register_error') }}</strong>
                    </span>
                @endif
                <div class="sec-title">
                    <h2>Sign Up</h2>
                </div>
                <div class="text">Don't have an account. Please Sign up first</div>
                <!--Contact Form-->
                <div class="contact-form">
                    {!! Form::open(['route' => 'register', 'method' => 'POST', 'id' => 'register_form', 'class' => 'form-register']) !!}
                        <div class="clearfix">
                            <div class="form-group">
                                {!! Form::text('first_name', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter first name', 'autofocus', 'required']); !!}
                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::text('last_name', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter last name', 'autofocus', 'required']); !!}
                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::text('reg_email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
                                @if ($errors->has('reg_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('reg_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>     
                            <div class="form-group">         
                                {!! Form::password('password_confirmation', ['class' => 'form-control input-lg', 'placeholder' => 'Enter confirm password']); !!}
                            </div>            
                            <div class="form-group text-right">                                
                                {!! Form::submit('Sign Up', ['class' => 'theme-btn submit-btn']); !!}
                            </div>                            
                        </div>                        
                    {!! Form::close() !!}
                </div>
            </div>           
        </div>
    </div>
</section>
@endsection
