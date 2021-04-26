
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
            <li class="{{ request()->is('user/home') || request()->is('user/home/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{Route('user.home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>
            <li class="{{ request()->is('admin/lesson/') || request()->is('admin/lesson/*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Lesson</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ request()->is('admin/lesson/lesson') || request()->is('admin/lesson/lesson/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("lesson.index")}}">Lesson Management</a></li>
                    <li class="{{ request()->is('admin/lesson/topic') || request()->is('admin/lesson/topic/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("topic.index")}}">Topic Management</a></li>
                    <li class="{{ request()->is('admin/lesson/level') || request()->is('admin/lesson/level/*') ? 'active' : '' }}"><a class="nav-link" href="{{Route("level.index")}}">Level Management</a></li>
                </ul>
            </li>
            <li class="{{ request()->is('admin/ladder') || request()->is('admin/ladder/*') ? 'active' : '' }}">
                <a class="nav-link" href="{{Route('ladder.index')}}"><i class="far fa-clipboard"></i> <span>Ladder</span></a>
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

                <li class="{{Request::path()==='user'?'active':''}}">
                    <a class="nav-link" href="#"><i class="fas fa-user"></i> <span>User</span></a>
                </li>


            <li class="dropdown">
            <li class="{{Request::path()==='settings'?'active':''}}">
                <a class="nav-link" href="#"><i class="fas fa-list"></i> <span>Settings</span></a>
            </li>

        </ul>

    </aside>
</div>
<?php //{{Request::path()==='/'?'current_page_item':''}} ?>
