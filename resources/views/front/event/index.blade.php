@extends('layouts.front.index')
@section('title', 'Event')

@section('content')
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h2>Event List</h2>
            </div>
            <div class="pull-right">
                <ul class="page-title-breadcrumb">
                    <li><a href="#"><span class="fa fa-home"></span>Home</a></li>
                    <li><a href="#">Event</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->

<!--Shop Section-->
<section class="shop-section">
    <div class="auto-container">
        
        <!--Sort By-->
        {{-- <div class="items-sorting">
            <div class="row clearfix">
                <div class="select-column col-md-4 col-sm-4 col-xs-12">
                    <div class="form-group">
                        <select name="sort-by">
                            <option>Sort by Default Order</option>
                            <option>By Order</option>
                            <option>By Price</option>
                        </select>
                    </div>
                </div>
                <div class="results-column pull-right col-md-6 col-sm-6 col-xs-12">
                    <h4>Showing 1–12 of 23 results</h4>
                </div>
            </div>
        </div> --}}
        
        <!--Shop Items-->
        <div class="shop-items">
            <div class="row clearfix">
            
                <div class="column col-md-4 col-sm-4 col-xs-12">
                    <!--News Block Three-->
                    <div class="news-block-three">
                        <div class="inner-box">
                            <div class="image">
                                <img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-7.jpg') }}" alt="" />
                                <div class="overlay-box">
                                    <div class="content">
                                        <div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                        <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>0</li>
                                            <li><span class="icon qb-eye"></span>740</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="column col-md-4 col-sm-4 col-xs-12">
                    <!--News Block Three-->
                    <div class="news-block-three">
                        <div class="inner-box">
                            <div class="image">
                                <img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-7.jpg') }}" alt="" />
                                <div class="overlay-box">
                                    <div class="content">
                                        <div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                        <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>0</li>
                                            <li><span class="icon qb-eye"></span>740</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="column col-md-4 col-sm-4 col-xs-12">
                    <!--News Block Three-->
                    <div class="news-block-three">
                        <div class="inner-box">
                            <div class="image">
                                <img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-7.jpg') }}" alt="" />
                                <div class="overlay-box">
                                    <div class="content">
                                        <div class="tag"><a href="blog-single-2.html">Travel</a></div>
                                        <h3><a href="blog-single-2.html">Develop a new Silk Road through Russia</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon qb-clock"></span>March 03, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>0</li>
                                            <li><span class="icon qb-eye"></span>740</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <br><br>
            <!-- Styled Pagination -->
            <div class="styled-pagination centered">
                <ul class="clearfix">
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a class="next" href="#"><span class="fa fa-angle-right"></span></a></li>
                </ul>
            </div>
            
        </div>
        
    </div>
</section>
<!--End Shop Section-->
@endsection