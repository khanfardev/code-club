
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Khanfar Blog</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">KHA</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ request()->is('admin/home') || request()->is('admin/home/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{Route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('admin/acm/') || request()->is('admin/acm/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>ACM YU</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/acm/home') || request()->is('admin/acm/acm/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("acm.home")}}">Dashboard ACM</a></li>
                    <li class="{{ request()->is('admin/acm/lesson') || request()->is('admin/acm/lesson/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("lesson.index")}}">Lesson Management</a></li>
                    <li class="{{ request()->is('admin/acm/topic') || request()->is('admin/acm/topic/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("topic.index")}}">Topic Management</a></li>
                    <li class="{{ request()->is('admin/acm/level') || request()->is('admin/acm/level/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("level.index")}}">Level Management</a></li>
                    <li class="{{ request()->is('admin/acm/ladder') || request()->is('admin/acm/ladder/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("ladder.index")}}">Ladder Management</a></li>

                </ul>
            </li>


            <li class="{{ request()->is('admin/calender/') || request()->is('admin/calender/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar"></i> <span>Calender</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/calender/venue') || request()->is('admin/lesson/lesson/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("venue.index")}}">Venue Management
                        </a></li>
                    <li class="{{ request()->is('admin/calender/event') || request()->is('admin/lesson/event/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("event.index")}}">Event Management
                        </a></li>
                    <li class="{{ request()->is('admin/calender/meeting') || request()->is('admin/lesson/meeting/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("meeting.index")}}">Meeting Management</a></li>
                    <li class="{{ request()->is('admin/calender/show-calendar') || request()->is('admin/lesson/show-calendar/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("ShowCalendar")}}">Calender View</a></li>

                </ul>
            </li>

                <li class="{{ request()->is('admin/user/') || request()->is('admin/user/*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-user"></i> <span>User</span></a>
                </li>


            <li class="dropdown">
            <li class="{{Request::path()==='settings'?'active':''}}">
                <a class="nav-link" href="#"><i class="fas fa-list"></i> <span>Settings</span></a>
            </li>

        </ul>

    </aside>
</div>
<?php //{{Request::path()==='/'?'current_page_item':''}} ?>
