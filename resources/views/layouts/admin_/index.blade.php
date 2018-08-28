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
        @yield('pagespecificstyles')

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
        
        <script src="{{ asset ('assets/admin/lib/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/moment/moment.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/jquery-ui/jquery-ui.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/jquery-switchbutton/jquery.switchButton.js') }}"></script>
        <script src="{{ asset ('assets/admin/lib/peity/jquery.peity.js') }}"></script>
        @yield('pagespecificscripts')         
    </body>
</html>
