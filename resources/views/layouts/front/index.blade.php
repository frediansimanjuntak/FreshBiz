<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title') | {{config('website.setting.name')}}</title>
<!-- Stylesheets -->
<link href="{{ asset ('assets/front/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/front/css/style.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/front/css/responsive.css') }}" rel="stylesheet">

<!--Color Themes-->
<link id="theme-color-file" href="{{ asset ('assets/front/css/color-themes/default-theme.css') }}" rel="stylesheet">

<!--Favicon-->
<link rel="shortcut icon" href="{{ asset ('assets/front/images/favicon.png') }}" type="image/x-icon">
<link rel="icon" href="{{ asset ('assets/front/images/favicon.png') }}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="{{config('website.setting.meta_description')}}">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    @include('layouts.front.header')           
    
    @yield('content')

    @include('layouts.front.footer')     
    
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-double-up"></span></div>

<!--End Scroll to top-->

<script src="{{ asset ('assets/front/js/jquery.js') }}"></script> 
<script src="{{ asset ('assets/front/js/bootstrap.min.js') }}"></script>
<script src="{{ asset ('assets/front/js/jquery.fancybox.pack.js') }}"></script>
<script src="{{ asset ('assets/front/js/jquery.fancybox-media.js') }}"></script>
<script src="{{ asset ('assets/front/js/owl.js') }}"></script>
<script src="{{ asset ('assets/front/js/appear.js') }}"></script>
<script src="{{ asset ('assets/front/js/wow.js') }}"></script>
<script src="{{ asset ('assets/front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset ('assets/front/js/script.js') }}"></script>
<script src="{{ asset ('assets/front/js/color-settings.js') }}"></script>

</body>
</html>
