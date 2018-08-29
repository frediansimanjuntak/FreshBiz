<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset ('assets/images/favicon.png') }}">
    <title>SignIn | Admin Kaiju Event</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset ('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset ('assets/admin/css/style.css') }}" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="{{ asset ('assets/admin/css/colors/blue.css') }}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(../assets/images/background/login-register.jpg);">
            <div class="login-box card">
                <div class="card-body">
                  {!! Form::open(['route' => 'admin.login', 'method' => 'POST', 'id' => 'login_form']) !!}
                        <h3 class="box-title m-b-20">Sign In</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                {!! Form::text('email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>                        
                    {!! Form::close() !!}                    
                </div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset ('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset ('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset ('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="{{ asset ('assets/admin/js/jquery.slimscroll.js') }}"></script>
    <!--Wave Effects -->
    <script src="{{ asset ('assets/admin/js/waves.js') }}"></script>
    <!--Menu sidebar -->
    <script src="{{ asset ('assets/admin/js/sidebarmenu.js') }}"></script>
    <!--stickey kit -->
    <script src="{{ asset ('assets/plugins/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>
    <script src="{{ asset ('assets/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!--Custom JavaScript -->
    <script src="{{ asset ('assets/admin/js/custom.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="{{ asset ('assets/plugins/styleswitcher/jQuery.style.switcher.js') }}"></script>
</body>

</html>




<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SignIn | Admin Kaiju Event</title>

    <!-- vendor css -->
    <link href="{{ asset ('assets/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset ('assets/admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="{{ asset ('assets/admin/css/bracket.css') }}">
  </head>

  <body>

    <div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> Admin Panel <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-60">Kaiju Event</div>
        {!! Form::open(['route' => 'admin.login', 'method' => 'POST', 'id' => 'login_form']) !!}
        <div class="form-group">
            {!! Form::text('email', '' ,['class' => 'form-control input-lg', 'placeholder' => 'Enter email address', 'required', 'autofocus']); !!}
        </div><!-- form-group -->
        <div class="form-group">
            {!! Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Enter password']); !!}
        </div><!-- form-group -->
        {!! Form::submit('Sign In', ['class' => 'btn btn-info btn-block']); !!}
        {!! Form::close() !!}
        
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="{{ asset ('assets/admin/lib/jquery/jquery.js') }}"></script>
    <script src="{{ asset ('assets/admin/lib/popper.js/popper.js') }}"></script>
    <script src="{{ asset ('assets/admin/lib/bootstrap/bootstrap.js') }}"></script>
  </body>
</html>