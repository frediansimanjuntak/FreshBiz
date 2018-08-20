@extends('layouts.admin.index')
@section('title', 'Dashboard')
@section('pagespecificstyles') 
<!-- style -->

<link href="{{ asset ('assets/admin/lib/rickshaw/rickshaw.min.css') }}" rel="stylesheet">
<link href="{{ asset ('assets/admin/lib/chartist/chartist.css') }}" rel="stylesheet">
<!-- /style -->
@endsection

@section('content')

@include('layouts.admin.footer')
@endsection

@section('pagespecificscripts')
<!-- script --> 
<script src="{{ asset ('assets/admin/lib/chartist/chartist.js') }}"></script>
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
<!-- /script -->
@endsection