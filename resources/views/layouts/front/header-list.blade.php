<ul class="navigation clearfix">
    <li class="{{ GlobalHelpers::front_set_active(['front.home']) }}"><a href="{{route('front.home')}}">Home</a></li>
    <li class="{{ GlobalHelpers::front_set_active(['front.event']) }}"><a href="{{route('front.event')}}">Browse Event</a></li>
    <li><a href="#">Organize</a></li>
    <li class="{{ GlobalHelpers::front_set_active(['front.news']) }}"><a href="{{route('front.news')}}">News</a></li>
    @auth         
    <li class="{{ GlobalHelpers::front_set_active(['login']) }}"><a href="{{ route('logout') }}">Sign Out</a></li>
    @else        
    <li class="{{ GlobalHelpers::front_set_active(['login']) }}"><a href="{{ route('login') }}">Sign In</a></li>
    @endauth
</ul>