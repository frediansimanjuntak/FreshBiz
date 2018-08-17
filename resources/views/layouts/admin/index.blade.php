<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="{{config('website.setting.meta_description')}}">
        <meta name="author" content="qs">

        <title>@yield('title') | Admin {{config('website.setting.name')}}</title>

        <!-- vendor css -->
        <link href="{{ asset ('assets/admin/lib/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset ('assets/admin/lib/Ionicons/css/ionicons.css') }}" rel="stylesheet">
        <link href="{{ asset ('assets/admin/lib/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet">
        <link href="{{ asset ('assets/admin/lib/jquery-switchbutton/jquery.switchButton.css') }}" rel="stylesheet">
        <link href="{{ asset ('assets/admin/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('assets/admin/lib/chartist/chartist.css') }}" rel="stylesheet">

        <!-- Bracket CSS -->
        <link rel="stylesheet" href="{{ asset ('assets/admin/css/bracket.css') }}">
    </head>

    <body>

        @include('layouts.admin.left-sidebar')

        @include('layouts.admin.header')

        @include('layouts.admin.right-sidebar')
        
        @yield('content')
        
        <script src="{{ asset ('assets/admin/lib/jquery/jquery.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/popper.js/popper.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/moment/moment.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/peity/jquery.peity.js') }}"></script>
        <script src="{{ asset ('assets/admin./lib/chartist/chartist.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/jquery.sparkline.bower/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/d3/d3.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/rickshaw/rickshaw.min.js') }}"></script>


        <script src="{{ asset ('assets/admin/js/bracket.js') }}"></script>
        <script src="{{ asset ('assets/admin/js/ResizeSensor.js') }}"></script>
        <script src="{{ asset ('assets/admin/js/dashboard.js') }}"></script>
        <script>
        $(function(){
            'use strict'

            // FOR DEMO ONLY
            // menu collapsed by default during first page load or refresh with screen
            // having a size between 992px and 1299px. This is intended on this page only
            // for better viewing of widgets demo.
            $(window).resize(function(){
            minimizeMenu();
            });

            minimizeMenu();

            function minimizeMenu() {
            if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
            }
        });
        </script>
    </body>
</html>
