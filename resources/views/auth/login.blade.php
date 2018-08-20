@extends('layouts.front.index')
@section('title', 'Sign In')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<section class="contact-section">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Form Column-->
            <div class="form-column col-md-6 col-sm-12 col-xs-12">
                <div class="sec-title">
                    <h2>Sign in</h2>
                </div>
                <div class="text">Welcome To Kaiju Event. Please Login if you have an account</div>
                <!--Contact Form-->
                <div class="contact-form">
                    {!! Form::open(['route' => 'login', 'method' => 'POST', 'id' => 'login_form']) !!}
                        <div class="clearfix">
                            <div class="form-group">
                                {!! Form::text('email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
                            </div>           
                            <div class="form-group text-right">                                
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
                            </div>
                            <div class="form-group">
                                {!! Form::text('last_name', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter last name', 'autofocus', 'required']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::text('email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
                            </div>
                            <div class="form-group">
                                {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
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
