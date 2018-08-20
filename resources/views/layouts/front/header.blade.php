<!-- Main Header -->
<header class="main-header">    
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">                
                <div class="pull-left">
                    <img class="logo-outer img-responsive" src="{{config('website.setting.logo_light')}}">
                    <div class="logo"><a href="index-1.html"></a></div>
                </div>
                
                <div class="pull-right upper-right clearfix">
                    <div class="add-image">
                        <a href="#"><img src="{{ asset ('assets/front/images/resource/header-add.jpg') }}" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Header Upper-->
    
    <!--Header Lower-->
    <div class="header-lower">
        <div class="auto-container">
            <div class="nav-outer clearfix">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="navbar-collapse collapse clearfix pull-right" id="bs-example-navbar-collapse-1">
                        @include('layouts.front.header-list')
                    </div>
                </nav>               
                
                <!-- Hidden Nav Toggler -->
                 <div class="nav-toggler">
                     <button class="hidden-bar-opener"><span class="icon qb-menu1"></span></button>
                 </div>
                
            </div>
        </div>
    </div>
    <!--End Header Lower-->
    
    <!--Sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <!--Logo-->
            <div class="pull-left">
                <img class="logo" src="{{config('website.setting.logo_small_dark')}}" width="150">
                <a href="index.html" class="img-responsive" title=""></a>
            </div>
            
            <!--Right Col-->
            <div class="right-col pull-right">
                <!-- Main Menu -->
                <nav class="main-menu">
                    <div class="navbar-header">
                        <!-- Toggle Button -->    	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        </button>
                    </div>
                    
                    <div class="navbar-collapse collapse clearfix">
                        @include('layouts.front.header-list')
                    </div>
                </nav><!-- Main Menu End-->
            </div>
            
        </div>
    </div>
    <!--End Sticky Header-->    
</header>
<!--End Header Style Two -->

<!-- Hidden Navigation Bar -->
<section class="hidden-bar left-align">
        
    <div class="hidden-bar-closer">
        <button><span class="qb-close-button"></span></button>
    </div>
    
    <!-- Hidden Bar Wrapper -->
    <div class="hidden-bar-wrapper">        
        <div class="logo">
            <a href="index.html">
            <img class="logo" src="{{config('website.setting.logo_small_light')}}" width="100">
            </a>
        </div>
        <br>
        <!-- .Side-menu -->
        <div class="side-menu">
            <!--navigation-->            
            @include('layouts.front.header-list') 
        </div>
        <!-- /.Side-menu -->       
       
    </div><!-- / Hidden Bar Wrapper -->
    
</section>
<!-- End / Hidden Bar -->
