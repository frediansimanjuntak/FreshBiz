@extends('layouts.front.index')
@section('title', 'News')

@section('content')
<!--Page Title-->
<section class="page-title">
    <div class="auto-container">
        <div class="clearfix">
            <div class="pull-left">
                <h2>News List</h2>
            </div>
            <div class="pull-right">
                <ul class="page-title-breadcrumb">
                    <li><a href="#"><span class="fa fa-home"></span>Home</a></li>
                    <li><a href="#">News</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--End Page Title-->
<!--Sidebar Page Container-->
<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <!--Sec Title-->
                <div class="sec-title">
                    <h2>Latest News</h2>
                </div>
                <div class="content-blocks">
                    <!--News Block Four-->
                    <div class="news-block-four">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <a href="{{route('front.news.detail')}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-10.jpg') }}" alt="" /></a>
                                    </div>
                                </div>
                                <div class="content-box col-md-8 col-sm-8 col-xs-12">
                                    <div class="content-inner">
                                        <div class="category"><a href="blog-single.html">Travel</a></div>
                                        <h3><a href="{{route('front.news.detail')}}">The Hyperloop dream just got one step closer to universal reality</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span>March 03, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>9</li>
                                            <li><span class="icon fa fa-eye"></span>7540</li>
                                        </ul>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--News Block Four-->
                    <div class="news-block-four">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <a href="{{route('front.news.detail')}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-11.jpg') }}" alt="" /></a>
                                    </div>
                                </div>
                                <div class="content-box col-md-8 col-sm-8 col-xs-12">
                                    <div class="content-inner">
                                        <div class="category"><a href="blog-single.html">Fashion</a></div>
                                    <h3><a href="{{route('front.news.detail')}}">Elon Musk's Hyperloop vision races toward first public test</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span>March 04, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>7</li>
                                            <li><span class="icon fa fa-eye"></span>20</li>
                                        </ul>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--News Block Four-->
                    <div class="news-block-four">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <a href="{{route('front.news.detail')}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-12.jpg') }}" alt="" /></a>
                                    </div>
                                </div>
                                <div class="content-box col-md-8 col-sm-8 col-xs-12">
                                    <div class="content-inner">
                                        <div class="category"><a href="blog-single.html">Sports</a></div>
                                        <h3><a href="{{route('front.news.detail')}}">A modern day security strategy for your computer antivirus</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span>March 05, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>5</li>
                                            <li><span class="icon fa fa-eye"></span>2450</li>
                                        </ul>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!--News Block Four-->
                    <div class="news-block-four">
                        <div class="inner-box">
                            <div class="row clearfix">
                                <div class="image-column col-md-4 col-sm-4 col-xs-12">
                                    <div class="image">
                                        <a href="{{route('front.news.detail')}}"><img class="wow fadeIn" data-wow-delay="0ms" data-wow-duration="2500ms" src="{{ asset ('assets/front/images/resource/news-13.jpg') }}" alt="" /></a>
                                    </div>
                                </div>
                                <div class="content-box col-md-8 col-sm-8 col-xs-12">
                                    <div class="content-inner">
                                        <div class="category"><a href="blog-single.html">Business</a></div>
                                        <h3><a href="{{route('front.news.detail')}}">Fix an Exchange Rate now with a  New Business Forward Contract App</a></h3>
                                        <ul class="post-meta">
                                            <li><span class="icon fa fa-clock-o"></span>March 06, 2016</li>
                                            <li><span class="icon fa fa-comment-o"></span>5</li>
                                            <li><span class="icon fa fa-eye"></span>4020</li>
                                        </ul>
                                        <div class="text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit doli. Aenean commodo ligula eget dolor. Aenean massa. Cumtipsu sociis natoque penatibus et magnis dis parturient montesti, nascetur ridiculus mus. Donec quam…</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                 <!-- Styled Pagination -->
                <div class="styled-pagination">
                    <ul class="clearfix">
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a class="next" href="#"><span class="fa fa-angle-right"></span></a></li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>
</div>
<!--End Sidebar Page Container-->

@endsection