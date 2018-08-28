<!-- ########## START: LEFT PANEL ########## -->
<div class="br-logo"><a href=""><span>[</span>Admin Panel<span>]</span></a></div>
<div class="br-sideleft overflow-y-auto">
    <label class="sidebar-label pd-x-15 mg-t-20">Navigation</label>
    <div class="br-sideleft-menu">
        <a href="{{ route('admin.home') }}" class="br-menu-link {{ GlobalHelpers::set_active(['admin.home']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Dashboard</span>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->    
        <a href="#" class="br-menu-link {{ GlobalHelpers::set_active(['admin.event.view.list', 'admin.event.view.create', 'admin.event.view.detail']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-coffee tx-24"></i>
                <span class="menu-item-label">Events</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.event.view.list')}}" class="nav-link">List</a></li>
            <li class="nav-item"><a href="{{route('admin.event.view.create')}}" class="nav-link">Create</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ GlobalHelpers::set_active(['admin.event_categories.view.list', 'admin.event_categories.view.create']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-clipboard tx-24"></i>
                <span class="menu-item-label">Event Categories</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.event_categories.view.list')}}" class="nav-link">List</a></li>
            <li class="nav-item"><a href="{{route('admin.event_categories.view.create')}}" class="nav-link">Create</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ GlobalHelpers::set_active(['admin.event_organisers.view.list', 'admin.event_organisers.view.create']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon ion-briefcase tx-20"></i>
                <span class="menu-item-label">Event Organisers</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.event_organisers.view.list')}}" class="nav-link">List</a></li>
            <li class="nav-item"><a href="{{route('admin.event_organisers.view.create')}}" class="nav-link">Create</a></li>
        </ul>
        <a href="#" class="br-menu-link {{ GlobalHelpers::set_active(['admin.user.view.list']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-person-stalker tx-24"></i>
                <span class="menu-item-label">Users</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.user.view.list')}}" class="nav-link">List</a></li>
        </ul>    
        <a href="#" class="br-menu-link {{ GlobalHelpers::set_active(['admin.setting.website.view.update', 'admin.setting.email.view.update']) }}">
            <div class="br-menu-item">
                <i class="menu-item-icon icon ion-ios-gear-outline tx-24"></i>
                <span class="menu-item-label">Setting</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- br-menu-link -->
        <ul class="br-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('admin.setting.website.view.update')}}" class="nav-link">Website</a></li>
            <li class="nav-item"><a href="{{route('admin.setting.email.view.update')}}" class="nav-link">Email</a></li>
        </ul>   
    </div><!-- br-sideleft-menu -->
  <br>
</div><!-- br-sideleft -->
<!-- ########## END: LEFT PANEL ########## -->