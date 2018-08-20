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