<!-- Main Header -->
<header class="main-header">    
    <!--Header-Upper-->
    <div class="header-upper">
        <div class="auto-container">
            <div class="clearfix">                
                <div class="pull-left">
                    <img class="logo-outer" src="{{config('website.setting.logo_light')}}" width="280">
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
                        <ul class="navigation clearfix">
                            <li class="current"><a href="#">Home</a></li>
                            <li><a href="#">Browse Event</a></li>
                            <li><a href="#">Organize</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
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
                        <ul class="navigation clearfix">
                            <li class="current"><a href="#">Home</a></li>
                            <li><a href="#">Browse Event</a></li>
                            <li><a href="#">Organize</a></li>
                            <li><a href="#">News</a></li>
                        </ul>
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
            <a href="index.html"></a>
        </div>
        <!-- .Side-menu -->
        <div class="side-menu">
            <!--navigation-->
            <ul class="navigation clearfix">
                <li class="current dropdown"><a href="#">Home</a>
                    <ul>
                        <li><a href="index-1.html">Home 01</a></li>
                        <li><a href="index-2.html">Home 02</a></li>
                        <li><a href="index-3.html">Home 03</a></li>
                        <li><a href="index-4.html">Home 04</a></li>
                        <li><a href="index-5.html">Home 05</a></li>
                        <li><a href="index-6.html">Home 06</a></li>
                        <li><a href="index-7.html">Home 07</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Headers</a>
                    <ul>
                        <li><a href="header-1.html">Header 01</a></li>
                        <li><a href="header-2.html">Header 02</a></li>
                        <li><a href="header-3.html">Header 03</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="gallery.html">gallery</a></li>
                <li class="dropdown"><a href="#">Blog</a>
                    <ul>
                        <li><a href="blog-single.html">blog Single One</a></li>
                        <li><a href="blog-single-2.html">Blog Single Two</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#">Shop</a>
                    <ul>
                        <li><a href="shop.html">Our Shop</a></li>
                        <li><a href="shop-single.html">Shop Single</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
             </ul>
        </div>
        <!-- /.Side-menu -->
        
        <!--Options Box-->
        <div class="options-box">
            <!--Sidebar Search-->
            <div class="sidebar-search">
                <form method="post" action="contact.html">
                    <div class="form-group">
                        <input type="search" name="text" value="" placeholder="Search ..." required="">
                        <button type="submit" class="theme-btn"><span class="fa fa-search"></span></button>
                    </div>
                </form>
            </div>
            
            <!--Mobile Cart-->
            <div class="mobile-cart">
                <a href="shop-single.html" class="clearfix">
                    <div class="pull-left">
                        <div class="text">0 items 0.00$</div>
                    </div>
                    <div class="pull-right">
                        <span class="icon fa fa-shopping-cart"></span>
                    </div>
                </a>
            </div>
            
            <!--Language Dropdown-->
            <div class="language dropdown"><a class="btn btn-default dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" href="#"> English <span class="icon fa fa-angle-down"></span></a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <li><a href="#">English</a></li>
                    <li><a href="#">German</a></li>
                    <li><a href="#">Arabic</a></li>
                    <li><a href="#">Hindi</a></li>
                </ul>
            </div>
            
            <!--Social Links-->
            <ul class="social-links clearfix">
                <li><a href="#"><span class="fa fa-facebook-f"></span></a></li>
                <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                <li><a href="#"><span class="fa fa-pinterest"></span></a></li>                    
            </ul>
            
        </div>
        
    </div><!-- / Hidden Bar Wrapper -->
    
</section>
<!-- End / Hidden Bar -->
